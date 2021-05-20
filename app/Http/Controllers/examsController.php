<?php

namespace App\Http\Controllers;
use App\Models\exams;
use Illuminate\Http\Request;
use \PDF;

class examsController extends Controller{

    public function getAllExams () {
        $exam = exams::all();
        return response()->json(['exams'=>$exam], 200);
    }

//insert data 
public function indetExamData(Request $request){

        $exam = new exams();

        $exam-> examName =$request->input('examName');
        $exam-> examId =$request->input('examId');
        $exam-> subject =$request->input('subject');
        $exam-> grade =$request->input('grade');
        $exam-> term =$request->input('term');
        $exam-> date =$request->input('date');
        $exam-> start =$request->input('start');
        $exam-> end =$request->input('end');
        $exam-> special =$request->input('special');

        $exam->save();
        return response()->json(['return'=>$exam, 'response'=>true], 201);
}

//delete code

public function deleteexamination ($id) {
    $exam = exams::find($id);

    if(!$exam) {
        return response()->json([
            "message"=>"Not found !", 404 
        ]);
    }
    $exam->delete();
    return response()->json([
        "message"=>" Deleted !", 201
    ]);
}


public function getExamDetails($id){    //for update page

    $exam = exams::find($id);

    $response = [

        'exams'=>$exam
    ];
    return response()->json($response,200);

}

public function editExamData(Request $request ,$id){

    $exam =  exams::find($id);

    $exam-> examName =$request->input('examName');
    $exam-> examId =$request->input('examId');
    $exam-> subject =$request->input('subject');
    $exam-> grade =$request->input('grade');
    $exam-> term =$request->input('term');
    $exam-> date =$request->input('date');
    $exam-> start =$request->input('start');
    $exam-> end =$request->input('end');
    $exam-> special =$request->input('special');

    $exam->save();
    return response()->json(['return'=>$exam, 'response'=>true], 201);
}


    public function examdownloadPDF () {
        $exam = exams::all();
        $pdf = PDF::loadView('examinationReport', ['exam' => $exam]);
        return $pdf->download('ExamReport.pdf');
    }




}