<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\NotificationController;


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

// DINETH ============================
// --> Classroom

Route::post('addclassroom',[ClassroomController::class, 'postClassroom']);
Route::get('getallclassrooms', [ClassroomController::class, 'getAllClassrooms']);
Route::delete('deleteclassroom/{id}', [ClassroomController::class, 'deleteClassroom']);
Route::get('/timeandclass/report-pdf', [ClassroomController::class, 'downloadPDF']);
Route::get('/timeandclass/show-report', [ClassroomController::class, 'showReport']);

Route::get('/timeandclass/report', function() {
    PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf = PDF::loadView('report');
    return $pdf->download('report.pdf');
});

//Thisara======================
// --> Notification management

Route::post('addNotice',[NotificationController::class, 'postNotice']);

Route::get('allNotice',[NotificationController::class, 'getNotice']);

Route::delete('deleteNotice/{id}', [NotificationController::class, 'deleteNotice']);




