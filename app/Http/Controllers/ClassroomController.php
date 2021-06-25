<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use \PDF;

class ClassroomController extends Controller
{
    // Add (Insert) Classroom
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

    //Delete a Classroom
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

    //Update a Classroom
    public function putClassroom(Request $request, $id){ 
        $classroom = Classroom::find($id);
        if(!$classroom){
            return response()->json(['msg'=>"Classroom not found"],404);
        }
        $classroom->cid = $request->input('classId');
        $classroom->capacity = $request->input('capacity');
        $classroom->width = $request->input('width');
        $classroom->length = $request->input('length');
        $classroom->resources = $request->input('resources');
        $classroom->save();
        return response()->json(['msg'=>$classroom],200);
   }

    //Show Report as HTML
    public function showReport () {
        $data = Classroom::all();
        return view('report', ['classrooms' => $data]);
    }
    
    //Generate and Download PDF
    public function downloadPDF () {
        $classroom = Classroom::all();
        $pdf = PDF::loadView('report', ['classrooms' => $classroom]);
        return $pdf->download('report.pdf');
    }

    //Find a Timeschedule
    public function findClassroom ($id) {
        $classroom = Classroom::find($id);
        $response = [
            'classroom'=>$classroom
        ];
        return response()->json($response,200);
    }
}