<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        
        if (auth::attempt($credentials))
        {
            
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 1) { // idRole 1 untuk admin
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 2) { // idRole 2 untuk consultant
                return redirect()->route('consultant.dashboard');
            }

            return redirect('/')->with('error', 'Role tidak dikenali.');
        }
        return redirect()->back()->with('error', 'Username atau password salah.');

    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->to('/');
    }
}
