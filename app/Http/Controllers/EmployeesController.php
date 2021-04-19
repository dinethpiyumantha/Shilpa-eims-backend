<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function getAllEmployees(){
        $allEmployees =employees::all();
        return response()->json(['employees'=>$allEmployees],200);
    }

    public function addEmloyee(Request $request){
      
        $employees = new employees();

         $employees-> nameInitial =$request->input('nameInitial');
         $employees-> fullName =$request->input('fullName');
         $employees-> address1 =$request->input('address1');
         $employees-> address2 =$request->input('address2');
         $employees-> city =$request->input('city');
         $employees-> date =$request->input('date');
         $employees-> Mnumber =$request->input('Mnumber');
         $employees-> Lnumber =$request->input('Lnumber');
         $employees-> email =$request->input('email');
         $employees-> gender =$request->input('gender');
         $employees-> dob =$request->input('dob');
         $employees-> nic =$request->input('nic');
         $employees-> department =$request->input('department');
         $employees-> special =$request->input('special');
         $employees-> Gname =$request->input('Gname');
         $employees-> GardianType =$request->input('GardianType');
         $employees-> add3 =$request->input('add3');
         $employees-> add4 =$request->input('add4');
         $employees-> city2 =$request->input('city2');
         $employees-> Mnumber2 =$request->input('Mnumber2');

         $employees->save();
         return response()->json(['return'=>$employees, 'response'=>true], 201);
     
    }



     public function deleteEmployee($id){
        $employee = employees::find($id);
        if(!$employee) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $employee->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);
        
    }

}

