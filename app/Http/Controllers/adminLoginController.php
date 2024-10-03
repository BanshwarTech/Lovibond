<?php

namespace App\Http\Controllers;

use App\Models\adminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminLoginController extends Controller
{
    public function login()
    {
        return view('adminLogin');
    }

    public function adminlogin(Request $request)
    {

        $email = $request->input('useremail');
        $password = $request->input('password');
        $result = adminLogin::where('email', $email)->first();
        if ($result) {
            $password = trim($request->input('password'));
            $storedPassword = trim($result->password);

            if ($password === $storedPassword) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_EMAIL', $email);
                return redirect('admin/dashboard');
            } else {
                return redirect()->route('login')->withErrors(['error' => 'Please enter the correct password']);
            }
        } else {

            return redirect()->route('login')->withErrors(['error' => 'Please enter valid login details']);
        }
    }


    public function adminlogout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Logout Successfully.');
    }
}
