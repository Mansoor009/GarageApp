<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin_index(){
        return view('admin.admin_index');
    }

    public function member_index(){
        return view('member.member_index');
    }
}
