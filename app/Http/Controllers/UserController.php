<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\student;
use App\Models\StudentBelongsTo;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers()
    {   

        $users = User::all();
        $roles = Role::all();
        $userRoles = UserRoles::all();

        return response()->json([
            'users' => $users, 
            'roles' => $roles,
            'user_roles' => $userRoles,
            ]);

    }
    public function getStudents()
    {   

        $studentBelongs = StudentBelongsTo::all();
        $students = student::all();

        return response()->json([
            'student_belongs' => $studentBelongs, 
            'students' => $students,
            ]);


    }
    public function createUser(Request $request)
    {   
        // Validate the form data
        $validatedData = $this->validate($request,[
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        // Create a new Users instance
        $users = new User([
            'id' => $validatedData['user_id'],
            'fullname' => $validatedData['name'],
            'email' => $validatedData['email'],
            'status' => '1',
            'password' => Hash::make($validatedData['user_id']),
        ]);
        $users->save();
        

        // // Create a new User Role instance
        $users_role = new UserRoles([
            'user_id' => $validatedData['user_id'],
            'role_id' => $validatedData['role'],
        ]);
        $users_role->save();



        // Redirect or return a response
        // return response()->json(['message' => 'User Created Successfully']);
        return $request;
    }

        
    public function updateUserStatus(Request $request)
    {           // Retrieve data from the request
        $valueToUpdate = $request->input('status');
        
        // Find the specific record
        $record = User::find($request['id']); // Replace $id with the specific ID of the record you want to update
        
        // Update the column
        $record->update(['status' => $valueToUpdate]);
        
    }
}
