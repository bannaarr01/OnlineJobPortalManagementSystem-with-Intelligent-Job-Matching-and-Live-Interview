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


//----Create Job Interview Meeting
Route::post('/job/interview/{id}/{uid}/{empid}', 'App\Http\Controllers\LiveInterviewController@create')->name('schedule.interview');
Route::get('/job/interview/{id}', 'App\Http\Controllers\LiveInterviewController@getInterview')->name('get.interview');

//---Delete Scheduled Interview
Route::post('/meetings/{id}', 'App\Http\Controllers\LiveInterviewController@delete')->where('id', '[0-9]+')->name('api.deleteScheduledInterview');

