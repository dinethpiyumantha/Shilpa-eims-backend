<?php

namespace App\Http\Controllers;

use App\Models\Fees;

use Illuminate\Http\Request;

class FeesControler extends Controller
{
    //Retrieve all fees
    public function getAllFees() {
        $allFees = Fees::all();
        return response() -> json(['Fees' => $allFees], 200);
    }

    //Add fee
    public function postFee (Request $request) {
        $fee = new Fees();

        $fee->stdid = $request->input('stdid');
        $fee->grade = $request->input('grade');
        $fee->subject = $request->input('subject');
        $fee->amount = $request->input('amount');



        $fee->save();

        return response()->json(['return'=>$fee, 'response'=>true], 201);
    }

    //Delete fee
    public function deleteFee ($id) {
        $fee = Fees::find($id);
        if(!$fee) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $fee->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);
    }

    //Update fee
    public function editFee(Request $request,$id){
        $fee = Fees::find($id);
        
        $fee->stdid = $request->input('stdid');
        $fee->grade = $request->input('grade');
        $fee->subject = $request->input('subject');
        $fee->amount = $request->input('amount');

        $fee->save();

        return response()->json(['msg'=>"Item not found"],404);
    }

    
}
