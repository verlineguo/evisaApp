<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApplicantAuthController extends Controller
{
    
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'username', 'password');

        // Proses autentikasi
        if (Auth::guard('applicant')->attempt($credentials)) {
            $user = Auth::guard('applicant')->user();
            
            // Redirect berdasarkan idRole
            if ($user->role == 1) { // idRole 1 untuk admin
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 2) { // idRole 2 untuk consultant
                return redirect()->route('consultant.dashboard');
            }
            return redirect()->back()->withErrors('Invalid role for this user.');
        }
        return redirect()->back()->withErrors('Invalid credentials.');
    }

    public function logout()
    {
        Auth::guard('applicant')->logout();
        return redirect()->route('login');
    }
}
