<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;

class SubjectsController extends Controller
{
    //
    public function getAll () {
        $all = Subjects::all();
        return response()->json(['all'=>$all], 200);
    }
}
