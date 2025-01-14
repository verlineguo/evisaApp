<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password'); // Get username and password
        
        $request->validate([
            'username' => 'required',
            'password'=> 'required',
        ]);
        $credentials['username'] = (string) $credentials['username'];


        if (Auth::guard('employee')->attempt($credentials)) {
            $user = Auth::guard('employee')->user();
            if ($user->role === 'R01') {
                return redirect()->route('admin.dashboard'); 
            } else {
                return redirect()->route('consultant.dashboard');
            }
        }
        // Authentication failed
        return back()->withErrors(['login' => 'Invalid username or password.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }


}
