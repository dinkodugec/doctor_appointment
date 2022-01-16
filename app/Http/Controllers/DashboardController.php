<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
   
   public function index()
   {
     /*   dd(Auth::user()->role->name); */
       if(Auth::user()->role->name=="patient"){
           return view('home');
       }
       return view('dashboard');
   }

}
