<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'createbyDriver']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id !== 1) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        $booking =  DB::table('booking')->leftjoin('users', 'booking.created_by', 'users.id')->select('booking.*', 'users.name')->orderBy('id', 'desc')->get();
        return view('admin.index', compact('booking'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.reservation');
    }

    public function createbyDriver()
    {
        return view('driver.orderform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:15',
            'tujuan' => 'required|string|max:255',
            'lokasi_jemput' => 'required|string|max:250',
            'tanggal_penjemputan' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_penjemputan',
        ]);

        $result = Booking::create([
            'nama_pemesan' => $request->nama_pemesan,
            'no_hp_wa' => $request->no_hp_wa,
            'lokasi_tujuan' => $request->tujuan,
            'lokasi_jemput' => $request->lokasi_jemput,
            'tanggal_penjemputan' => $request->tanggal_penjemputan,
            'tanggal_kembali' => $request->tanggal_kembali,
            'created_by' => Auth::check() ? Auth::user()->id : null,
        ]);

        return redirect()->route('home')
                        ->with('success','Rule Pemeriksaan Sukses Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
