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
Route::view('/register',  'register');
Route::view('/seed',  'submission');
Route::view('/register-attendee',  'register-attendee');
Route::view('/tac-admin',  'admin');
Route::post('/seed', 'SubmissionController@store');
Route::post('/register', 'Registration@store');
Route::post('/register-attendee', 'AttendeeRegistrationpA@store');
Route::get('/assembly-data', 'AssemblyData');

Route::get('/attendee-data', 'Registration@index');
Route::get('/branches-data', 'BranchController');

// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
