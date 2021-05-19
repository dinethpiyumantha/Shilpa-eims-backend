<?php

namespace App\Http\Controllers;

use App\Models\Studentsubjects;
use Illuminate\Http\Request;

class StudentsubjectsController extends Controller
{
    //

    //SUbJECT
    public function getAllStudentSubjectMain() {
        $allStudentsubjects = Studentsubjects::all();
        return response()->json(['Studentsubjects' => $allStudentsubjects],200);
    }

    //ADD SUBJECT
    public function addStudentSubject(Request $request){
      
        $Studentsubjectss = new Studentsubjects();

         $Studentsubjectss->  studentID =$request->input('studentID');
         $Studentsubjectss-> subject =$request->input('subject');
         $Studentsubjectss-> grade =$request->input('grade');
        
         

         $Studentsubjectss->save();
         return response()->json(['return'=>$Studentsubjectss, 'response'=>true], 201);
     
    }



    public function deleteStudnetSubject($id) {
        $Studentsubjectss = Studentsubjects::find($id);
        if(!$Studentsubjectss) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $Studentsubjectss->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);


    }



}
