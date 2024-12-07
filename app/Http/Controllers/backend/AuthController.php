<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function register()
    {
        return view('backend.auth.register');
    }

    public function submit_register(Request $request)
    {

        $username = $request->input('name');
        $email    = $request->input('email');
        $password = $request->input('password');
        $profile  = $request->file('profile');

        // move image to file
        $path = './assets/image';
        $image = time() . '-' . $profile->getClientOriginalName();
        $profile->move($path, $image);

        $result = DB::table('users')->insert([
            'name'     => $username,
            'email'    => $email,
            'password' => Hash::make($password),
            'profile'  => $image

        ]);

        if ($result) {
            return redirect()->route('login');
        }
    }

    public function submit_login(Request $request)
    {
        $username_email = $request->input('name_email');
        $password       = $request->input('password');

        if(Auth::attempt(['name' => $username_email, 'password' => $password])) {
            return redirect()->route('dashboard');
        }
        if(Auth::attempt(['email' => $username_email, 'password' => $password])) {
            return redirect()->route('dashboard');
        }
        else{
            return back()->with('message','failed to login');
        }

    }

    public function logout(){
        return view('backend.auth.logout');
    }
    public function submitlogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
