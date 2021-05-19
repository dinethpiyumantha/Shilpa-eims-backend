<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //Student 
    public function getAllStudents() {
        $allStudents = Students::all();
        return response()->json(['Students' => $allStudents],200);
    }


    public function addStudent(Request $request){
      
        $students = new Students();

         $students-> nameInitil =$request->input('nameInitil');
         $students-> nameFull =$request->input('nameFull');
         $students-> addressL1 =$request->input('addressL1');
         $students-> addressL2 =$request->input('addressL2');
         $students-> city =$request->input('city');
         $students-> joinDate =$request->input('joinDate');
         $students-> mNumber =$request->input('mNumber');
         $students-> lNumber =$request->input('lNumber');
         $students-> email =$request->input('email');
         $students-> gender =$request->input('gender');
         $students-> dob =$request->input('dob');
         $students-> gName =$request->input('gName');
         $students-> gType =$request->input('gType');
         $students-> gAddressL1 =$request->input('gAddressL1');
         $students-> gAddressL2 =$request->input('gAddressL2');
         $students-> gCity =$request->input('gCity');
         $students-> gMnumber =$request->input('gMnumber');
         

         $students->save();
         return response()->json(['return'=>$students, 'response'=>true], 201);
     
    }


    public function deleteStudent($id) {
        $student = Students::find($id);
        if(!$student) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $student->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);
    }

}



