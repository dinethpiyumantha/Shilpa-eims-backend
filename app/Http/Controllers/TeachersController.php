<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers;

class TeachersController extends Controller
{
      // Get All ClassroomsTeacher
      public function getAllTeacher() {

        $allTeachers = Teachers::all();
        return response()->json(['allTeachers'=>$allTeachers], 200);
      }
      
    public function addTeacher (Request $request) {
        $teachers = new Teachers();
        
            $teachers-> nameInitil =$request->input('nameInitil');
            $teachers-> nameFull =$request->input('nameFull');
            $teachers-> addressL1 =$request->input('addressL1');
            $teachers-> addressL2 =$request->input('addressL2');
            $teachers-> city =$request->input('city');
            $teachers-> joinDate =$request->input('joinDate');
            $teachers-> mNumber =$request->input('mNumber');
            $teachers-> lNumber =$request->input('lNumber');
            $teachers-> email =$request->input('email');
            $teachers-> gender =$request->input('gender');
            $teachers-> dob =$request->input('dob');
            //$teachers-> nic =$request->input('nic');
            //$teachers-> department =$request->input('department');
            //$teachers-> special =$request->input('special');
            $teachers-> gName =$request->input('gName');
            $teachers-> gType =$request->input('gType');
            $teachers-> gAddressL1 =$request->input('gAddressL1');
            $teachers-> gAddressL2 =$request->input('gAddressL2');
            $teachers-> gCity =$request->input('gCity');
            $teachers-> gMnumber =$request->input('gMnumber');
   
        $teachers->save();

        return response()->json(['return'=>$teachers, 'response'=>true], 201);
    }

    public function deleteTeacher($id) {
      $teacher = Teachers::find($id);
      if(!$teacher) {
          return response()->json([
              "message"=>"Item not found !", 404 
          ]);
      }
      $teacher->delete();
      return response()->json([
          "message"=>"Item Deleted !", 201
      ]);
  }

  public function getEditTeacher($id) {
    $teachers = Teachers::find($id);

    $response = [

        'Teachers'=>$teachers
    ];
    return response()->json($response,200);
  }
}