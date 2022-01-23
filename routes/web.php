<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@index');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/new-appointment/{doctorId}/{date}','FrontendController@show')
->name('create.appointment');

  Route::group(['middleware'=>['auth','patient']], function(){

    Route::post('/book/appointment', 'FrontendController@store')->name('booking.appointment');

    Route::get('/my-booking', 'FrontendController@myBookings')->name('my.booking');

    Route::get('/dashboard','DashboardController@index');

    Route::get('/user-profile','ProfileController@index');
    Route::post('/profile','ProfileController@store')->name('profile.store');

    Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');

  });





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware'=>['auth','admin']], function(){ /* protect route */
      Route::resource('doctor', 'DoctorController');
      Route::get('patients', 'PatientlistController@index');
    });

Route::group(['middleware'=>['auth','doctor']], function(){

Route::resource('appointment', 'AppointmentController');
Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');

Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');
});