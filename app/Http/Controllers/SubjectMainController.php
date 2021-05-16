<?php

namespace App\Http\Controllers;


use App\Models\SubjectMain;
use Illuminate\Http\Request;

class SubjectMainController extends Controller
{
    //SUbJECT
    public function getAllSubjectMain() {
        $allSubjectMain = SubjectMain::all();
        return response()->json(['SubjectMain' => $allSubjectMain],200);
    }
}