<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login.login');
    }

    public function postLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])) { 
            return \redirect('admin', $email);
        } else {
            return \redirect()->back();
        }
    } 
}
