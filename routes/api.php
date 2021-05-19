<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EmployeesController;

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



// ASANKA ============================
// --------------> Employee
Route::get('employees/getall',[EmployeesController::class,'getAllEmployees']); //get databse details
Route::post('employees/add',[EmployeesController::class,'addEmloyee']); //insert data
Route::delete('employees/delete/{id}', [EmployeesController::class, 'deleteEmployee']);
Route::get('employees/getItem/{id}',[EmployeesController::class,'getEmpDetails']); //get databse details for edit page
Route::put('employees/editItem/{id}',[EmployeesController::class,'editEmpDetails']); //update details for edit page

// --> Report
Route::get('employees/report-pdfEmp', [EmployeesController::class, 'downloadPDFemp']); //PDF Report
Route::get('employees/show-reportEmp', [EmployeesController::class, 'showReportEmp']); //HTML Report



