<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'ایمیل خود را وارد نمایید',
            'email.email' => 'ایمیل خود را صحیح وارد نمایید',
            'password.required' => 'رمز عبور خود را وارد نمایید',
            'password.min' => 'رمز عبور باید بیش از 8 کاراکتر باشد',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
//            return response()->json(Auth::user(), 200);
            return session()->put('userData',Auth::user());


        }
//        throw ValidationException::withMessaages([
//            'email' => ['the provided credentials are incorrect']

//        ]);
    }
}
