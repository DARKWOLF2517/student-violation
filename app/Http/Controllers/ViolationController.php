<?php

namespace App\Http\Controllers;

use App\Models\ViolationRecord;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    
    public function createViolation(Request $request)
    {   
        // Validate the form data
        $validatedData = $this->validate($request,[
            'id' => 'required',
            'type_of_violation' => 'required',
            'remarks' => 'required',
            'officer' => 'required',
        ]);

        // Create a new Users instance
        $violations = new ViolationRecord([
            'student_id' => $validatedData['id'],
            'violation_officer_id' => $validatedData['officer'],
            'types_of_violation' => $validatedData['type_of_violation'],
            'remarks'  => $validatedData['remarks'],
            'status' => $validatedData['status']?? 1,
        ]);
        $violations->save();

        // Redirect or return a response
        return response()->json(['message' => 'User Created Successfully']);
        // return $request;
    }

    public function getViolation()
    {   

        $users = ViolationRecord::all();
        return response()->json($users);

    }
}
