<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Testimony;
use App\Models\ViolationRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;

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
            'status' => $validatedData['status']?? 0,
        ]);
        $violations->save();

        // Redirect or return a response
        return response()->json(['message' => 'User Created Successfully']);
        // return $request;
    }

    public function getViolation()
    {   

        $violation = ViolationRecord::all();
        $students = student::all();
        


        return response()->json([
            'violations' => $violation, 
            'students' => $students,
            ]);

            
    }
    public function createTestimony(Request $request)
    {   
        // Validate the form data
        $validatedData = $this->validate($request,[
            'violation_list_id' => 'required',
            'witness' => 'required',
            'testimonyDetails' => 'required',
        ]);

        // Create a new Users instance
        $violations = new Testimony([
            'violation_list_id' => $validatedData['violation_list_id'],
            'name' => $validatedData['witness'],
            'testimony' => $validatedData['testimonyDetails'],
        ]);
        $violations->save();

        // Redirect or return a response
        return response()->json(['message' => 'Added Successfully']);
        // return $request;
    }

    public function getTestimony()
    {   
        $testimony = Testimony::all();
        return  $testimony;
    }

    public function deleteViolation(ViolationRecord $violation)
    {
        $violation->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function getUpdateViolationRecord($id)
    {   
        $violation_record = ViolationRecord::where('violation_list_id', $id)->get();
        return $violation_record;
    }

    public function updateViolation(Request $request, ViolationRecord $id)
    {   

        $request -> validate([
            'type_of_violation' => 'required',
            'remarks' => 'required',
        ]);

        $id->update($request->all());
        
        return response()->json(['message' => 'Violation Updated Successfully']);
        // return $request;
    }

    public function updateViolationStatus($id, $decision)
    {

        
        $violation = ViolationRecord::find($id);
                
        try {
        
        $violation->update(['status' => $decision]);
        
        DB::commit();
        
        return response()->json([
            'message' => 'Updated successfully',
            'violation' => $violation
        ]);

        } catch (\Exception $e) {

        DB::rollBack();
        
        return response()->json(['error' => $e->getMessage()]); 
        }
        // return $decision;
    }

}
