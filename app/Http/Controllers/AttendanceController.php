<?php

namespace App\Http\Controllers;
use App\Models\attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function postAddAttendance(Request $request){

        $Attendance = new attendance();
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



    public function getAlldata()
    {
        $allData= attendance::all();
        return response()->json(['allData'=>$allData],404);

    }


    public function deleteAttendance($id)
{
    $att= attendance::find($id);

    if(!$att){
        return response()->json(['msg'=>"Attendance not found"],404);
    }

    $att->delete();
    return response()->json(['msg'=>"Attendance deleted"],201);
    
    
}

   public function updateAttendance(Request $request,$id){

    $Attendance= attendance::find($id);

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