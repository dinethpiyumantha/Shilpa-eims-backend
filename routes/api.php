<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectMainController;




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

// LAKSHAN ============================
// --> Student

Route::get('getallstudents', [StudentsController::class, 'getAllStudents']);
Route::post('students/add',[StudentsController::class, 'addStudent']);
Route::delete('student/delete/{id}', [StudentsController::class, 'deleteStudent']);
Route::get('students/edit/{id}', [StudentsController::class, 'getStudentsDetails']); //for update page


// --> SubjectMain
Route::get('subjetmainget', [SubjectMainController::class, 'getAllSubjectMain']);  //getAllSubjectMain = Controller Methord


// --> Time Scheduling




