<?php

namespace App\Http\Controllers;

use App\Models\timeschedule;
use App\Models\Subjects;
use App\Models\Teachers;
use Illuminate\Http\Request;
use \DB;

class TimescheduleController extends Controller
{
    //Get All Schedule
    public function getAllSchedules () {
        $allSchedules = timeschedule::all();
        return response()->json(['allSchedules'=>$allSchedules], 200);
    }


    //Add a Schedule
    public function addSchedule (Request $request) {
        $timeschedule = new timeschedule();

        $timeschedule->type = $request->input('type');
        $timeschedule->spdate = $request->input('spdate');
        $timeschedule->from = $request->input('from');
        $timeschedule->to = $request->input('to');
        $timeschedule->review = $request->input('review');
        $timeschedule->day = $request->input('day');
        $timeschedule->tid = $request->input('tid');
        $timeschedule->sid = $request->input('sid');
        $timeschedule->classid = $request->input('cid');

        $timeschedule->save();
        return response()->json(['return'=>$timeschedule, 'response'=>true], 201);
    }



    //Delete a Schedule
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



    //Edit a Schedule
    public function editSchedule (Request $request, $id) {
        $timeschedule = timeschedule::find($id);
        if(!$timeschedule) {
            return response()->json([
                "message"=>"timeschedule not found !", 404 
            ]);
        }

        $timeschedule->type = $request->input('type');
        $timeschedule->spdate = $request->input('spdate');
        $timeschedule->from = $request->input('from');
        $timeschedule->to = $request->input('to');
        $timeschedule->review = $request->input('review');
        $timeschedule->day = $request->input('day');
        $timeschedule->tid = $request->input('tid');
        $timeschedule->sid = $request->input('sid');
        $timeschedule->classid = $request->input('cid');

        $timeschedule->save();
        return response()->json(['return'=>$timeschedule, 'response'=>true], 200);
    }
   


    //Find a Timeschedule
    public function findSchedule ($id) {
        $timeschedule = timeschedule::find($id);
        $response = [
            'timeschedule'=>$timeschedule
        ];
        return response()->json($response,200);
    }



    //Update a Classroom
    public function putTimeSchedule(Request $request, $id){ 
        $timeschedule = timeschedule::find($id);

        if(!$timeschedule){
            return response()->json(['msg'=>"Timeschedule not found"],404);
        }

        $timeschedule->type = $request->input('type');
        $timeschedule->spdate = $request->input('spdate');
        $timeschedule->from = $request->input('from');
        $timeschedule->to = $request->input('to');
        $timeschedule->review = $request->input('review');
        $timeschedule->day = $request->input('day');
        $timeschedule->tid = $request->input('tid');
        $timeschedule->sid = $request->input('sid');
        $timeschedule->classid = $request->input('cid');

        $timeschedule->save();
        return response()->json(['return'=>$timeschedule, 'response'=>true], 200);
   }



     //Joined Tables related to TimeSchedules
     public function getRelatedAll () {
        return response()->json(['allSchedules'=>(
            DB::table('timeschedules')
            ->join('teachers', 'teachers.id', 'timeschedules.tid')
            ->join('subjects', 'subjects.id', 'timeschedules.sid')
            ->get())] , 200);
    }



    //Retrive TimeSchedules
    public function retriveTimeSchedules () {
        return response()->json(['timeschedules' => (
            DB::table('timeschedules')
            ->join('teachers', 'teachers.id', 'timeschedules.tid')
            ->join('subjects', 'subjects.id', 'timeschedules.sid')
            ->join('classrooms', 'classrooms.id', 'timeschedules.classid')
            ->select('timeschedules.id','timeschedules.tid', 'timeschedules.sid', 'timeschedules.classid', 'teachers.nameInitil', 'subjects.name', 'classrooms.cid', 'timeschedules.type', 'timeschedules.spdate', 'timeschedules.day', 'timeschedules.from', 'timeschedules.to')
            ->get()
        )], 200);
    }



    



}
