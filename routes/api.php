<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TimescheduleController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AttendanceController;

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
Route::get('classrooms/getall', [ClassroomController::class, 'getAllClassrooms']); //ClassroomController.getAllClassrooms()
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


//Thisara======================
// --> Notification management
Route::post('addNotice',[NotificationController::class, 'postNotice']);
Route::get('allNotice',[NotificationController::class, 'getNotice']);
Route::delete('deleteNotice/{id}', [NotificationController::class, 'deleteNotice']);


// LAKSHAN ============================
// --> Student
Route::get('getallstudents', [StudentsController::class, 'getAllStudents']);
Route::post('students/add',[StudentsController::class, 'addStudent']);
Route::delete('student/delete/{id}', [StudentsController::class, 'deleteStudent']);


// DEEN ============================
// --> Small Expenses
Route::post('addexpense',[ExpensesController::class, 'postExpense']);
Route::get('getallexpenses', [ExpensesController::class, 'getAllExpenses']);
Route::delete('deleteexpense/{id}', [ExpensesController::class, 'deleteExpense']);


// ASANKA ============================
// --> Employee
Route::get('employees/getall',[EmployeesController::class,'getAllEmployees']); //get databse details
Route::post('employees/add',[EmployeesController::class,'addEmloyee']); //insert data
Route::get('employees/getItem',[EmployeesController::class,'getItems']); //get databse details
Route::delete('employees/delete/{id}', [EmployeesController::class, 'deleteEmployee']);


// SADISHA ============================
// --> Attendance
Route::post('attendance/add',[AttendanceController::class,'postAddAttendance']);
Route::get('attendance/getall', [AttendanceController::class, 'getAlldata']);
Route::get('getAttendance/update/{id}', [AttendanceController::class, 'getAlldataupdate']);
Route::delete('delete/attendance/{id}', [AttendanceController::class, 'deleteAttendance']);
Route::put('update/attendance/{id}', [AttendanceController::class, 'updateAttendance']);