<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Booking;

class PatientlistController extends Controller
{
    public function index()
    { 
        date_default_timezone_set('Australia/Melbourne');

        $bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
        return view('admin.patientlist.index',compact('bookings'));
    }




}
