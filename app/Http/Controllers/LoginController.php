<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $user = User::where('id', Auth::id())->first();
            // dd($userOrganization->organization->name);
            // session(['org_id' =>  $userRoles->student_org_id]);
            // session(['username' =>  $userRoles->organization->name]);
            if($user->status == 1){
                if($userRoles->role_id == 1){
                    // return redirect()->intended('/login/org_dashboard');
                    return '1';
                }
                else if($userRoles->role_id == 2){
                    // return redirect()->intended('/login/student_dashboard');
                    return '2';
                }
                else if($userRoles->role_id == 3){
                    // return redirect()->intended('/login/student_dashboard');
                    return '3';
                }
                else{
                    return '0';
                }
            }
            else if($user->status == 0){
                return '4';
            }
            
        }
        else{
            return '0';
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        // return $request;
        // return $request;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }


}
