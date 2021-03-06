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

Route::get('/', function () {
    return view('welcome');
});


// Report
Route::get('/financial_report', function () {
    $pdf = PDF::loadView('financial');
    return $pdf->download('finance.pdf');
});









// Report thisara
Route::get('/notification', function () {
    $pdf = PDF::loadView('notification');
    return $pdf->download('notification.pdf');
});


// Report
Route::get('teacher_report', function () {
    $pdf = PDF::loadView('teacher');
    return $pdf->download('teacher.pdf');
});

