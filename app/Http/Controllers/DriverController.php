<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Sprintj;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
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
        $spj =  DB::table('spj')
            ->join('booking', 'spj.booking_id', 'booking.id')
            ->leftjoin('users', 'booking.created_by', 'users.id')
            ->select('spj.*', 'users.name as order_name', 'booking.created_by AS orderan_driver')
            ->get();

        $driverOrders = $spj->groupBy('order_name')->map(function ($group) {
            return $group->count(); // Hitung jumlah orderan per driver
        });
        
        return view('driver.index', ['driverOrders' => $driverOrders])->with('i');
    }

    public function kalenderBooking()
    {
        $booking =  DB::table('booking')->leftjoin('users', 'booking.created_by', 'users.id')->select('booking.*', 'users.name')->orderBy('id', 'desc')->get();
        
        return view('driver.kalenderBooking', compact('booking'))->with('i');
    }
}
