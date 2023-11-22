<?php

namespace App\Http\Controllers;

use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {

            //if the user has only ONE org or role
            $userRoles = UserRoles::where('user_id', Auth::id())->first();
            // dd($userOrganization->organization->name);
            // session(['org_id' =>  $userRoles->student_org_id]);
            // session(['org_name' =>  $userRoles->organization->name]);
            if($userRoles->role_id == 1){
                // return redirect()->intended('/login/org_dashboard');
                return '1';
            }
            else if($userRoles->role_id == 2){
                // return redirect()->intended('/login/student_dashboard');
                return '2';
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return 'error';
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        // return $request;
        // return $request;
    }

}
