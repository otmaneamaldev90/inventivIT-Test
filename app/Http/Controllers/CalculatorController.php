<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{

    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {

        // validate the request
        $request->validate([
            'first_number' => 'required|numeric',
            'second_number' => 'required|numeric',
            'operator' => 'required'
        ]);

        // calculate the result based on the operator
        $first_number = $request->first_number;
        $second_number = $request->second_number;
        switch ($request->operator) {
            case '+':
                $result = $first_number + $second_number;
                break;
            case '-':
                $result = $first_number - $second_number;
                break;
            case '*':
                $result = $first_number * $second_number;
                break;
            case '/':
                // check if the second number is not zero to avoid division by zero
                if ($second_number != 0) {
                    $result = $first_number / $second_number;
                } else {
                    $result = 'Division by zero is not allowed.';
                }
                break;
            default:
                // if the operator is not one of the above operators, return an error message
                $result = 'Invalid operator';
        }

        // return the result to the view 
        $result = is_numeric($result) ? "{$first_number} {$request->operator} {$second_number} = {$result}" : $result;
        return redirect()->back()->with('result', $result);
    }
}
