<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Patient;
// use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        $update = DB::table('updates')
            ->first();
        $date =  now()->format('l, F d Y, H:i:s');
        // dd($date);
        return view('login',compact('update', 'date'));
    }

    function validate_login(Request $request)
    {
        $user = User::where([
            // 'username' => $request->username, 
            'password' => $request->password
        ])->first();

        // $request->validate([
        //     // 'name' =>  'required',
        //     'password'  =>  'required'
        // ]);

        // $credentials = $request->only('name', 'password');
        $credentials = $request->only('password');

        // if (Auth::attempt($credentials)) {
        //     return redirect('dashboard');
        // }
        if ($user) {
            Auth::login($user);
            return redirect('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    function dashboard(Request $request)
    {
        if (Auth::check()) {
            return redirect('home');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
