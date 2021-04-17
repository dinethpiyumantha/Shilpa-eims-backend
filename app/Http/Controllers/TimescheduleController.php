<?php

namespace App\Http\Controllers;

use App\Models\timeschedule;
use Illuminate\Http\Request;

class TimescheduleController extends Controller
{
    //
    public function getAllSchedules () {
        $allSchedules = timeschedule::all();
        return response()->json(['allSchedules'=>$allSchedules], 200);
    }

    public function addSchedule (Request $request) {
        $timeschedule = new timeschedule();

        $timeschedule->spdate = $request->input('spdate');
        $timeschedule->from = $request->input('from');
        $timeschedule->to = $request->input('to');
        $timeschedule->review = $request->input('review');
        $timeschedule->tid = $request->input('tid');
        $timeschedule->sid = $request->input('sid');
        $timeschedule->cid = $request->input('cid');

        $timeschedule->save();
        return response()->json(['return'=>$timeschedule, 'response'=>true], 201);
    }

    public function deleteSchedule ($id) {
        $timeschedule = timeschedule::find($id);

        if(!$timeschedule) {
            return response()->json([
                "message"=>"timeschedule not found !", 404 
            ]);
        }
        $timeschedule->delete();
        return response()->json([
            "message"=>"timeschedule Deleted !", 201
        ]);
    }

    public function editSchedule (Request $request, $id) {
        $timeschedule = timeschedule::find($id);
        if(!$timeschedule) {
            return response()->json([
                "message"=>"timeschedule not found !", 404 
            ]);
        }

        $timeschedule->spdate = $request->input('spdate');
        $timeschedule->from = $request->input('from');
        $timeschedule->to = $request->input('to');
        $timeschedule->review = $request->input('review');
        $timeschedule->tid = $request->input('tid');
        $timeschedule->sid = $request->input('sid');
        $timeschedule->cid = $request->input('cid');

        $timeschedule->save();
        return response()->json(['return'=>$timeschedule, 'response'=>true], 200);
    }
}
