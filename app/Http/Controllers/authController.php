<?php 

namespace App\Http\Controllers;
use illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authLogin(Request $request)
    {

        $employee = $request->only('username', 'password');
        Log::info('Request Data:', $request->all());
        if (Auth::attempt($employee)) 
        {
            $request->session()->regenerate();
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('gagal', 'username atau password salah');
        }
    }
}