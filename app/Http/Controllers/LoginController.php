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
        // $ldate = date('Y-m-d H:i:s');
        // dd($ldate);
        return view('login', compact('update', 'date'));
    }

    function validate_login(Request $request)
    {
        $user = User::where('password', md5($request->password))->first();

        if ($user) {
            Auth::login($user);
            return redirect('home');
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
