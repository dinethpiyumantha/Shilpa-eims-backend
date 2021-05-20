<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectMainController;
use App\Http\Controllers\StudentsubjectsController;



use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TimescheduleController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\examsController;
use App\Http\Controllers\TeachersController;

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

// Sadani ============================
Route::get('teacher/getallteacher', [TeachersController::class, 'getAllTeacher']);
Route::post('teacher/addteacher',[TeachersController::class, 'addTeacher']);
Route::delete('teacher/delete/{id}', [TeachersController::class, 'deleteTeacher']);
Route::get('teacher/geteditteacher/{id}', [TeachersController::class, 'getEditTeacher']);

// DINETH ============================
// --> Classroom
Route::get('classrooms/getall', [ClassroomController::class, 'getAllClassrooms']); //ClassroomController.getAllClassrooms()
Route::get('classrooms/get/{id}', [ClassroomController::class, 'findClassroom']);
Route::post('addclassroom',[ClassroomController::class, 'postClassroom']);
Route::delete('deleteclassroom/{id}', [ClassroomController::class, 'deleteClassroom']);
Route::put('classroom/edit/{id}', [ClassroomController::class, 'putClassroom']);

// --> Time Scheduling
Route::get('timeschedule/getall', [TimescheduleController::class, 'getAllSchedules']);
Route::get('timeschedule/get/{id}', [TimescheduleController::class, 'findSchedule']);
Route::post('timeschedule/add', [TimescheduleController::class, 'addSchedule']);
Route::delete('timeschedule/delete/{id}', [TimescheduleController::class, 'deleteSchedule']);
Route::put('timeschedule/edit/{id}', [TimescheduleController::class, 'putTimeSchedule']);
Route::get('timeschedule/relget', [TimescheduleController::class, 'getRelatedAll']);
Route::get('timeschedule/retrive', [TimescheduleController::class, 'retriveTimeSchedules']);

// --> Report
Route::get('/timeandclass/report-pdf', [ClassroomController::class, 'downloadPDF']); //PDF Report
Route::get('/timeandclass/show-report', [ClassroomController::class, 'showReport']); //HTML Report


// -- sadeesha
Route::get('/attendance/repattendanceReport-pdf', [AttendanceController::class, 'PDFdownload']);//attendance report eka
Route::get('/attendance/attendanceReport', function() {
    PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf = PDF::loadView('attendanceReport');
    return $pdf->download('attendanceReport.pdf');
});
Route::post('attendance/add',[AttendanceController::class,'postAddAttendance']);
Route::get('attendance/getall', [AttendanceController::class, 'getAlldata']);
Route::get('getAttendance/update/{id}', [AttendanceController::class, 'getAlldataupdate']);
Route::delete('delete/attendance/{id}', [AttendanceController::class, 'deleteAttendance']);
Route::put('update/attendance/{id}', [AttendanceController::class, 'updateAttendance']);


//Thisara======================
// --> Notification management
Route::post('addNotice',[NotificationController::class, 'postNotice']);
Route::get('allNotice',[NotificationController::class, 'getNotice']);
Route::delete('deleteNotice/{id}', [NotificationController::class, 'deleteNotice']);
Route::put('editNotice/{id}', [NotificationController::class, 'editNotice']);
Route::get('/notification/show-report', [NotificationController::class, 'showReport']);


// LAKSHAN ============================
// --> Student
Route::get('getallstudents', [StudentsController::class, 'getAllStudents']);
Route::post('students/add',[StudentsController::class, 'addStudent']);
Route::delete('student/delete/{id}', [StudentsController::class, 'deleteStudent']);
Route::get('students/edit/{id}', [StudentsController::class, 'getStudentsDetails']); //for update page
Route::put('student/update/{id}', [StudentsController::class, 'editStudent']); //edit student
// --> Report
Route::get('/student/report-pdf', [StudentsController::class, 'downloadStudentPDF']); //PDF Report
Route::get('/student/show-report', [StudentsController::class, 'showStudentReport']); //HTML Report
Route::get('/student/report', function() {
    PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf = PDF::loadView('report');
    return $pdf->download('report.pdf');
});



// --> SubjectMain
Route::get('subjetmainget', [SubjectMainController::class, 'getAllSubjectMain']);  //getAllSubjectMain = Controller Methord
Route::post('subject/add',[SubjectMainController::class, 'addSubject']); //Add subject
Route::delete('subject/delete/{id}', [SubjectMainController::class, 'deleteSubject']);

// --> StudentSubjectMain
Route::get('studenntsubjetmainget', [StudentsubjectsController::class, 'getAllStudentSubjectMain']);  //getAllSubjectMain = Controller Methord
Route::post('studenntsubject/add',[StudentsubjectsController::class, 'addStudentSubject']); //Add subject
Route::delete('studenntsubject/delete/{id}', [StudentsubjectsController::class, 'deleteStudnetSubject']);


// DEEN ============================
// --> Small Expenses
Route::post('addexpense',[ExpensesController::class, 'postExpense']);
Route::get('getallexpenses', [ExpensesController::class, 'getAllExpenses']);
Route::delete('deleteexpense/{id}', [ExpensesController::class, 'deleteExpense']);


// ASANKA ============================
// --> Employee
Route::get('employees/getall',[EmployeesController::class,'getAllEmployees']); //get databse details
Route::post('employees/add',[EmployeesController::class,'addEmloyee']); //insert data
Route::delete('employees/delete/{id}', [EmployeesController::class, 'deleteEmployee']);
Route::get('employees/getItem/{id}',[EmployeesController::class,'getEmpDetails']); //get databse details for edit page
Route::put('employees/editItem/{id}',[EmployeesController::class,'editEmpDetails']); //update details for edit page

// --> Report
Route::get('employees/report-pdfEmp', [EmployeesController::class, 'downloadPDFemp']); //PDF Report
Route::get('employees/show-reportEmp', [EmployeesController::class, 'showReportEmp']); //HTML Report

