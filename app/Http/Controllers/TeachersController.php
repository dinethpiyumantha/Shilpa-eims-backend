<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers;

class TeachersController extends Controller
{
    // Get All Teachers
    public function getAllTeachers () {

        $all = Teachers::all();
        return response()->json(['allTeachers'=>$all], 200);
    }

    // Add Teacher
    public function postTeacher (Request $request) {
        $teacher = new Teachers();

        $teacher->nameInitil = $request->input('nameInitil');
        $teacher->nameFull = $request->input('nameFull');
        $teacher->addressL1 = $request->input('addressL1');
        $teacher->addressL2 = $request->input('addressL2');
        $teacher->city = $request->input('city');
        $teacher->joinDate = $request->input('joinDate');
        $teacher->mNumber = $request->input('mNumber');
        $teacher->lNumber = $request->input('lNumber');
        $teacher->email = $request->input('email');
        $teacher->gender = $request->input('gender');
        $teacher->dob = $request->input('dob');
        $teacher->gName = $request->input('gName');
        $teacher->gType = $request->input('gType');
        $teacher->gAddress1 = $request->input('gAddress1');
        $teacher->gAddress2 = $request->input('gAddress2');
        $teacher->gCity = $request->input('gCity');
        $teacher->gMnumber = $request->input('gMnumber');

        $teacher->save();
        return response()->json(['return'=>$teacher, 'response'=>true], 201);
    }


    //Delete Teacher
    public function deleteTeacher ($id) {
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


    //Update Teacher
    public function putTeacher (Request $request, Teachers $teacher) {
        $teacher->update($request->all());
        return response()->json($teacher, 200);
    }
}
