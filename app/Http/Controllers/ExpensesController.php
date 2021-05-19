<?php

namespace App\Http\Controllers;

use App\Models\Expenses;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    //Retrieve all expenses
    public function getAllExpenses() {
        $allExpenses = Expenses::all();
        return response() -> json(['Expenses' => $allExpenses], 200);
    }

    //Add expense
    public function postExpense (Request $request) {
        $expense = new Expenses();

        $expense->description = $request->input('description');
        $expense->amount = $request->input('amount');

        $expense->save();

        return response()->json(['return'=>$expense, 'response'=>true], 201);
    }

    //Delete expense
    public function deleteExpense ($id) {
        $expense = Expenses::find($id);
        if(!$expense) {
            return response()->json([
                "message"=>"Item not found !", 404 
            ]);
        }
        $expense->delete();
        return response()->json([
            "message"=>"Item Deleted !", 201
        ]);
    }
}
