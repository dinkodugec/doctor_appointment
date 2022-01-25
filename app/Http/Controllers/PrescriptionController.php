<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Prescription;

class PrescriptionController extends Controller
{
    
     public function index()
     {
        date_default_timezone_set('Australia/Melbourne');

        $bookings = Booking::where('date',date('Y-m-d'))->where('status',1)
        ->get();
        return view('prescription.index',compact('bookings'));
        
     }



}
