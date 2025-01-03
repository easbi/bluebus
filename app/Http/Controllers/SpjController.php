<?php

namespace App\Http\Controllers;

use App\Models\Sprintj;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class SpjController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id != 1) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        $spj =  DB::table('spj')->leftjoin('users', 'spj.created_by', 'users.id')->select('spj.*', 'users.name')->orderBy('id', 'desc')->get();
        
        return view('admin.spj.index', compact('spj'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Booking $booking)
    {
        // Cek apakah booking_id sudah ada di tabel Sprintj
        $existingTransaction = Sprintj::where('booking_id', $booking->id)->first();

        if ($existingTransaction) {
            // Jika sudah ada, berikan pesan error dan kembali ke halaman sebelumnya
            return redirect()->back()->with('error', 'SPJ data ini sudah ada, tidak perlu dibuat lagi. Silahkan cek tabel SPJ!');
        }
        // Buat nomor SPJ unik, misalnya dengan format SPJ-{timestamp}-{id booking}
        $noSpj = 'SPJ-' . time() . '-' . $booking->id;

        // Salin data dari tabel booking ke tabel transaksi
        $transaksi = Sprintj::create([
            'booking_id' => $booking->id,
            'no_spj' => $noSpj, 
            'tgl_spj' => date('Y-m-d'), 
            'nama_pemesan' => $booking->nama_pemesan,
            'no_hp_wa' => $booking->no_hp_wa,
            'lokasi_tujuan' => $booking->lokasi_tujuan,
            'lokasi_jemput' => $booking->lokasi_jemput,
            'tanggal_penjemputan' => $booking->tanggal_penjemputan,
            'tanggal_kembali' => $booking->tanggal_kembali,            
            'bus_id' => $booking->tipe_bus,
            'driver_id' => $booking->created_by,
            'lama_sewa' => (strtotime($booking->tanggal_kembali) - strtotime($booking->tanggal_penjemputan)) / (60 * 60 * 24) + 1,
            'created_by' => Auth::user()->id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('spj.index')
                         ->with('success', 'Data berhasil disalin ke tabel transaksi dengan No SPJ: ' . $noSpj);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function show(Sprintj $sprintj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function edit(Sprintj $sprintj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sprintj $sprintj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sprintj $sprintj)
    {
        //
    }
}
