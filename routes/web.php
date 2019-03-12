<?php

use App\Events\NewRegistration;
use App\Attendee;
use App\Mail\SuccessfulRegistration;
use App\Estores;

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


Route::view('/',  'welcome');
// Route::get('/', function () {
//     $attendee = Attendee::first();
//     // dd($attendee->toArray());
//     // event(new NewRegistration($attendee));
// });
Route::view('/register',  'register');
Route::post('/register', 'Registration@store');
Route::get('/assembly-data', 'AssemblyData');
