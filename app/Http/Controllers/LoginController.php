<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
// use App\Models\Mitra;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

// use Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request) 
    {
        if (Auth::guard('mahasiswa')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index_beasiswa');
        } 
        elseif (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin_beasiswa');
        }
        elseif (Auth::guard('mitra')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('mitra_beasiswa');
        }
        return redirect('/')->with('error', 'Email atau password salah. Silakan coba lagi.');
    }

    
    public function logout(Request $request) 
    {
        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('mitra')->check()) {
            Auth::guard('mitra')->logout();
        }
        
        return redirect ('login');            
    }
    
    public function register(){
        return view('Pengguna.register');
    }
    
    public function saveRegister(Request $request) {
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi' => $request->prodi, 
            'angkatan' => $request->angkatan, 
            'ttl' => $request->ttl,
            'level' => 'user', 
            'email' => $request->email, 
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        Auth::guard('mahasiswa')->login($mahasiswa);

        return redirect()->route('index_beasiswa');
    }
}
