<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TimescheduleController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\examsController;

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

//pawan =======
//-->Examination
// PAWAN ============================
// // --> Exam
// Route::get('Exam/getresult', [ClassroomController::class, 'getAllresults']);

// Route::get('Examination/getall', [ExaminationController::class, 'getAll']);
// Route::post('/addexam',['uses'=>'examsController@postexam']);
Route::post('addexam/getexamdata',[examsController::class, 'indetExamData']);
Route::get('examgetall/getall', [examsController::class, 'getAllExams']);
Route::delete('deleteexams/{id}', [examsController::class, 'deleteexamination']);
Route::get('examgetallEdit/getallEdit/{id}', [examsController::class, 'getExamDetails']); //edit page
Route::put('examUpdate/updateExam/{id}', [examsController::class, 'editExamData']);
Route::get('examReport/report-pdf', [examsController::class, 'examdownloadPDF']); //PDF Report

// DINETH ============================
// --> Classroom
Route::get('classrooms/getall', [ClassroomController::class, 'getAllClassrooms']);
Route::post('addclassroom',[ClassroomController::class, 'postClassroom']);
Route::delete('deleteclassroom/{id}', [ClassroomController::class, 'deleteClassroom']);
Route::put('putclassroom/{classroom}', [ClassroomController::class, 'putClassroom']);

// --> Time Scheduling
Route::get('timeschedule/getall', [TimescheduleController::class, 'getAllSchedules']);
Route::post('timeschedule/add', [TimescheduleController::class, 'addSchedule']);
Route::delete('timeschedule/delete/{id}', [TimescheduleController::class, 'deleteSchedule']);
Route::put('timeschedule/edit/{id}', [TimescheduleController::class, 'editSchedule']);

// --> Report
Route::get('/timeandclass/report-pdf', [ClassroomController::class, 'downloadPDF']); //PDF Report
Route::get('/timeandclass/show-report', [ClassroomController::class, 'showReport']); //HTML Report
Route::get('/timeandclass/report', function() {
    PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf = PDF::loadView('report');
    return $pdf->download('report.pdf');
});



// --> Report
Route::get('/exam/report-pdf', [ClassroomController::class, 'downloadPDF']); //PDF Report
Route::get('/timeandclass/show-report', [ClassroomController::class, 'showReport']); //HTML Report
Route::get('/timeandclass/report', function() {
    PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf = PDF::loadView('report');
    return $pdf->download('report.pdf');
});