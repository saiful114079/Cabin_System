<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* ================ Patient ================ */
Route::get('patient-some-list','Api\PatientController@getPatientSomeData');
Route::get('doctor-some-list','Api\DoctorController@getSomeDoctorList');

Route::apiResource('cabin','Api\CabinInfoController');
Route::post('cabin-booking-filter/date','Api\CabinBookingController@cabinBookingStatus');
Route::apiResource('cabin-booking','Api\CabinBookingController');

