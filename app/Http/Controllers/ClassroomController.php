<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use \PDF;

class ClassroomController extends Controller
{
    // Add Classroom
    public function postClassroom (Request $request) {
        $classroom = new Classroom();

        $classroom->cid = $request->input('classId');
        $classroom->capacity = $request->input('capacity');
        $classroom->width = $request->input('width');
        $classroom->length = $request->input('length');
        $classroom->resources = $request->input('resources');

        $classroom->save();

        return response()->json(['return'=>$classroom, 'response'=>true], 201);
    }

    // Get All Classrooms
    public function getAllClassrooms () {

        $allClassrooms = Classroom::all();
        return response()->json(['allClassrooms'=>$allClassrooms], 200);
    }

    //Delete Classroom
    public function deleteClassroom ($cid) {
        $classroom = Classroom::find($cid);
        if(!$classroom) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $classroom->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);
    }

    //Update Classroom
    public function putClassroom (Request $request, Classroom $classroom) {
        $classroom->update($request->all());
        return response()->json($classroom, 200);
    }

    //Report
    public function showReport () {
        $data = Classroom::all();
        return view('report', ['classrooms' => $data]);
    }

    public function downloadPDF () {
        $classroom = Classroom::all();
        $pdf = PDF::loadView('report', ['classrooms' => $classroom]);
        return $pdf->download('report.pdf');
    }
}