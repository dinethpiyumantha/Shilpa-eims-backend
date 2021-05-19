<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \PDF;

class NotificationController extends Controller
{

    public function postNotice(Request $request)
    {

        $notice = new Notification();
        $expl = explode(',',$request->image);
        $decode = base64_decode($expl[1]);
        if (str_contains($expl[0],'png')) {
            $exte = 'png';
        }else {
            $exte = 'jpg';
        }
        $currenttime = Carbon::now()->timestamp;
        $filename = $currenttime.'.'.$exte;
        $filepath = public_path().'/'.$filename;
        file_put_contents($filepath,$decode);
        $notice-> heder = $request->input('heder');
        $notice-> body = $request->input('body');
        $notice-> date = $request->input('date');
        $notice-> image = $filename;
        $notice-> postBy = $request->input('postBy');

        $notice->save();

        return response () -> json(['massagesdfd'=>$notice],200);

    }
    // Get All Notice
    public function getNotice () {

        $allNotice = Notification::all();
        return response()->json(['allNotice'=> $allNotice], 201);
    }

    //delete notice
    public function deleteNotice ($nid) {
        $notification = Notification::find($nid);
        if(!$notification) {
            return response()->json([
                "message"=>"Item not found !", 404
            ]);
        }
        $notification->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);
    }
    //edit notification
    public function editNotice(Request $request,$id){
        $notice = Notification::find($id);
        if(!$notice) {
            return response()->json([
                "message"=>"Item not found !", 404
            ]);
        }
        $expl = explode(',',$request->image);
        $decode = base64_decode($expl[1]);
        if (str_contains($expl[0],'png')) {
            $exte = 'png';
        }else {
            $exte = 'jpg';
        }
        $currenttime = Carbon::now()->timestamp;
        $filename = $currenttime.'.'.$exte;
        $filepath = public_path().'/'.$filename;
        file_put_contents($filepath,$decode);
        $notice-> heder = $request->input('heder');
        $notice-> body = $request->input('body');
        $notice-> date = $request->input('date');
        $notice-> image = $filename;
        $notice-> postBy = $request->input('postBy');
        $notice->save();
        return response()->json(['mag'=>"Item not found"],404);
    }

    //Report
    public function showReport () {
        $notification = Notification::all();
        $pdf = PDF::loadView('notification', ['notification' => $notification]);
        return $pdf->download('report.pdf');
    }


    public function downloadPDF () {
        $notification = Notification::all();
        $pdf = PDF::loadView('notification', ['notification' => $notification]);
        return $pdf->download('report.pdf');
    }

}
