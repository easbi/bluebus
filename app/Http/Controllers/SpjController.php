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
        //
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
    public function store(Request $request)
    {
        //
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
