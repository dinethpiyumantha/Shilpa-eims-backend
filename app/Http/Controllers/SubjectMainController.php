<?php

namespace App\Http\Controllers;


use App\Models\SubjectMain;
use Illuminate\Http\Request;

class SubjectMainController extends Controller
{
    //SUbJECT
    public function getAllSubjectMain() {
        $allSubjectMain = SubjectMain::all();
        return response()->json(['SubjectMain' => $allSubjectMain],200);
    }

    //ADD SUBJECT
    public function addSubject(Request $request){
      
        $subjectmains = new SubjectMain();

         $subjectmains->  subjectID =$request->input('subjectID');
         $subjectmains-> subject =$request->input('subject');
         $subjectmains-> grade =$request->input('grade');
        
         

         $subjectmains->save();
         return response()->json(['return'=>$subjectmains, 'response'=>true], 201);
     
    }



    public function deleteSubject($id) {
        $subjectmains = SubjectMain::find($id);
        if(!$subjectmains) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $subjectmains->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);


    }
}