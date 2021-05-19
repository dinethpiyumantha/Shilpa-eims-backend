<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //
    public function postAddAttendance(Request $request){
        $Attendance = new Attendance();
        date_default_timezone_set("Asia/Colombo");
        $Attendance->Userid = $request->input('Userid');
        $Attendance->name = $request->input('name');
        $Attendance->Phone = $request->input('Phone');
        $Attendance->In = date("Y-m-d H:i:s"); 
        $Attendance->Out = date("Y-m-d H:i:s"); 
        $Attendance->Discreption = $request->input('Discreption');

        $Attendance->save();
        return response()->json(['message'=>$Attendance],201);
    }



    public function getAlldata () {
        $allData = Attendance::all();
        return response()->json(['allData'=>$allData], 200);
    }


    public function getAlldataupdate ($id) {
        $updateA = Attendance::find($id);
        $response=['updateA'=>$updateA];
        return response()->json($response, 200);
    }

   


    public function deleteAttendance($id) {
        $att= Attendance::find($id);

        if(!$att){
            return response()->json(['msg'=>"Attendance not found"],404);
        }

        $att->delete();
        return response()->json(['msg'=>"Attendance deleted"],201);
    }

    public function updateAttendance(Request $request,$id){
        $Attendance= Attendance::find($id);

        if(!$Attendance){
            return response()->json(['msg'=>"Attendance not found"],404);
        }

        date_default_timezone_set("Asia/Colombo");
        $Attendance->Userid = $request->input('Userid');
        $Attendance->name = $request->input('name');
        $Attendance->Phone = $request->input('Phone');
        $Attendance->In = date("Y-m-d H:i:s"); 
        $Attendance->Out = date("Y-m-d H:i:s"); 
        $Attendance->Discreption = $request->input('Discreption');

        $Attendance->save();
        return response()->json(['msg'=>$Attendance],201);
   }

}
