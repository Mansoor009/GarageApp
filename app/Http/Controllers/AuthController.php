<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register_view()
    {
        return view('authentication.register');
    }
    
    public function register_control(Request $request)
    {
        $success = false;
        $status_code = 422;
        $message = 'Oops Something went wrong please try again later';
        try {
            $validator = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'mobile_number' => 'required|numeric|digits:10'
            ]);

            $fields = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile_number' => $request->mobile_number,
                'role' => 'member'
            ];

            $create = User::create($fields);
            $lastId = $create->id;

            $success = true;
            $status_code = 200;
            $message = 'User Registered Successfully';

            return response(['success' => $success, 'message' => $message, 'id' => $lastId], $status_code);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function login_view()
    {
        return view('authentication.login');
    }

    public function login_control(Request $request){
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status == 0) {
                return response(['message' => 'Your Account Is De-Activated', 'success' => 'denied'],200);
            } 
            else if ($user->role == 'admin' && $user->status == 1) {
                return response(['message' => 'Admin Succesfully Logging in', 'success' => 'admin'],200);
            }
            else if ($user->role == 'member' && $user->status == 1) {
                return response(['message' => 'Member Succesfully Logging in', 'success' => 'member'],200);
            }
        } else {
            return response(['Message' => 'Wrong Credentials', 'success' => false],422);
        }
    }

    public function logOut(Session $session)
    {
        $session->flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
