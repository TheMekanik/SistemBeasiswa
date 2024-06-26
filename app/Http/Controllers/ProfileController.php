<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class ProfileController extends Controller
{

    use Notifiable, HasFactory;

    public function __construct()
    {
       $this->middleware('auth:mahasiswa');
        $this->middleware('CekLevel:user'); 
    }
    public function show_profileMHS()
    {
        $mahasiswa = Auth::user();
        return view('Pengguna.profile_mahasiswa', compact('mahasiswa'));
    }

    public function edit_profileMHS(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'nim' => 'required',
            'prodi' => 'required', 
            'angkatan' => 'required', 
            'ttl' => 'required', 
            'password' => 'required' 
        ]);

        $mahasiswa = Auth::user();
        
        $mahasiswa->update([
            'name' => $request->name, 
            'nim' => $request->nim, 
            'prodi' => $request->prodi, 
            'angkatan' => $request->angkatan, 
            'ttl' => $request->ttl, 
            'password' => Hash::make($request->password)
        ]);

        return Redirect::back();
    }

    // public function show_rekomendasi()
    // {
    //     $mahasiswa = Auth::user();
    //     return view('Pengguna.rekomendasi');
    // }

}
