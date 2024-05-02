<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\VerifyRequest;
use App\Http\Requests\User\LoginRequest;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(StoreRequest $request)
    {
        $verify_token = Str::random(10);
        User::query()->create([
            'user_name' => $request->getUserName(),
            'email' => $request->getEmail(),
            'password' => Hash::make($request->getPassword()),
            'verify_token' => $verify_token
        ]);

        Mail::to($request->getEmail())->send(new SendMail($verify_token));

        return redirect()->route('login');
    }

    public function verify(VerifyRequest $request)
    {
        $user = User::query()->where('verify_token', $request->getVerifyToken())->first();

        if($user) {
            $user->update([
                'email_verified_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('login');
    }

    public function profile()
    {
        $name = Auth::user()->user_name;

        return view('profile', compact('name'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {        
        $credentials = [
            "email" => $request->getEmail(),
            "password" => $request->getPassword(),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('profile');
        }

        return back();
    }

}
