<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register_view():View
    {
        return view('authentication.register');
    }
    
    public function register_control(Request $request):JsonResponse
    {
        try {
            dd($request->all());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function login_view():View
    {
        return view('authentication.login');
    }

    public function login_control(){
        
    }
}
