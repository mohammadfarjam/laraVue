<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function MongoDB\BSON\toJSON;

class RegisterController extends Controller
{
    public function register(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|min:8|confirmed'
        ], [
                'name.required' => 'نام کاربری خود را وارد نمایید',
                'name.max' => 'نام کاربری شما بیش از 50 کاراکتر می باشد',
                'email.required' => 'ایمیل خود را وارد نمایید',
                'email.email' => 'ایمیل خود را صحیح وارد نمایید',
                'email.unique' => 'ایمیل قبلا ثبت شده است',
                'password.required' => 'رمز عبور خود را وارد نمایید',
                'password.min' => 'رمز عبور باید بیش از 8 کاراکتر باشد',
                'password.confirmed' => 'تکرار رمز عبور تطابق ندارد',
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
