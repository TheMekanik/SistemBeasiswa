<?php

namespace App\Http\Controllers;

use App\Models\SuratRekomendasi;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Dokumen;
use App\Models\Registrasi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class BeasiswaController extends Controller
{
    public function createBeasiswa()
    {
        $mitra_id = Auth::id();
        $beasiswa = Beasiswa::where('mitra_id', $mitra_id)->first();

        if ($beasiswa) {
            return redirect()->route('my_beasiswa')->with('error', 'Anda sudah menginput data beasiswa.');
        }

        return view('Pengguna.create_beasiswa');
    }
    public function simpanBeasiswa(Request $request) 
    {
        $mitra_id = Auth::id();

        Log::info('Mitra ID: ' . $mitra_id);

        $request->validate([
            'namaBeasiswa' => 'required', 
            'deskripsiBeasiswa' => 'required', 
            'linkPendaftaran' => 'required', 
            'oprecStart' => 'required', 
            'oprecEnd' => 'required', 
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));


        Beasiswa::create([
            'namaBeasiswa' => $request->namaBeasiswa,
            'mitra_id' => $mitra_id,  
            'deskripsiBeasiswa' => $request->deskripsiBeasiswa, 
            'linkPendaftaran' => $request->linkPendaftaran, 
            'oprecStart' => $request->oprecStart,  
            'oprecEnd' => $request->oprecEnd,
            'image' => $path
        ]);

        return Redirect::route('createBeasiswa');
    }

    public function index_beasiswa()
    {
        $beasiswas = Beasiswa::all();
        // dd($beasiswas->toArray());
        return view('HalamanDepan.beranda', compact('beasiswas'));
    } 

    public function admin_beasiswa()
    {
        $beasiswas = Beasiswa::all();
        return view('HalamanDepan.berandaAdmin', compact('beasiswas'));
    
    }
    public function mitra_beasiswa()
    {
        $beasiswas = Beasiswa::all();
        return view('HalamanDepan.berandaMitra', compact('beasiswas'));
    }

    
    public function show_beasiswa(Beasiswa $beasiswa) 
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $admin = Auth::guard('user')->user();
        $mitra = Auth::guard('mitra')->user();
        $rekomendasi = null;

        $registrasis = null;

        // $registrasis = Registrasi::where('beasiswa_id', $beasiswa->id)->where('nim_mhs', $mahasiswa->nim)->first();
        // if ($mahasiswa) {
        //     $rekomendasi = SuratRekomendasi::where('nim_mhs', $mahasiswa->nim)->where('is_rekomendasi', true)->first();
        //     $registrasis = Registrasi::where('beasiswa_id', $beasiswa->id)->where('nim_mhs', $mahasiswa->nim)->first();
        // }

        if ($mahasiswa) {
            $registrasis = Registrasi::where('beasiswa_id', $beasiswa->id)->where('nim_mhs', $mahasiswa->nim)->first();
            $rekomendasi = SuratRekomendasi::where('nim_mhs', $mahasiswa->nim)->where('is_rekomendasi', true)->first();
        }

        return view('Pengguna.show_beasiswa', compact('beasiswa', 'rekomendasi', 'registrasis', 'mahasiswa', 'admin', 'mitra'));
    }

    


    public function my_beasiswa()
    {
        $mitra = Auth::user();
        $my_beasiswas = Beasiswa::where('mitra_id', $mitra->id)->get();

        return view('Pengguna.my_beasiswa', compact('my_beasiswas'));
    }

    public function show_user()
    {
        $mahasiswas = Mahasiswa::all();
        return view('Pengguna.data_mahasiswa', compact('mahasiswas'));
    }

    public function delete_beasiswa(Beasiswa $beasiswa)
    {
        $beasiswa->delete();
        return Redirect::route('mitra_beasiswa');
    }

    public function edit_beasiswa(Beasiswa $beasiswa)
    {
        return view('Pengguna.edit_beasiswa', compact('beasiswa'));
    }

    public function update_beasiswa(Beasiswa $beasiswa, Request $request)
    {
        $mitra_id = Auth::id();

        Log::info('Mitra ID: ' . $mitra_id);

        $request->validate([
            'namaBeasiswa' => 'required', 
            'deskripsiBeasiswa' => 'required', 
            'linkPendaftaran' => 'required', 
            'oprecStart' => 'required', 
            'oprecEnd' => 'required', 
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));


        $beasiswa->update([
            'namaBeasiswa' => $request->namaBeasiswa,
            'deskripsiBeasiswa' => $request->deskripsiBeasiswa, 
            'linkPendaftaran' => $request->linkPendaftaran, 
            'oprecStart' => $request->oprecStart,  
            'oprecEnd' => $request->oprecEnd,
            'image' => $path
        ]);

        return Redirect::route('createBeasiswa', $beasiswa);
    }

    public function unggah_dokumen() 
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $registrasis = Dokumen::where('nim_mhs', $mahasiswa->nim)->get();
        return view('Pengguna.unggah_dokumen', compact('registrasis'));
    }

    public function upload(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        $request->validate([
            'image_cv' => 'required', 
            'image_transkrip' => 'required'
        ]);

        $file_cv = $request->file('image_cv');
        $file_transkrip = $request->file('image_transkrip');
        $path_cv = time() . '_' . $request->name . '.' . $file_cv->getClientOriginalExtension();
        $path_transkrip = time() . '_' . $request->name . '.' . $file_transkrip->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path_cv, file_get_contents($file_cv));
        Storage::disk('local')->put('public/' . $path_transkrip, file_get_contents($file_cv));

        
        Dokumen::create([
            'nim_mhs' => $mahasiswa->nim,  
            'image_cv' => $path_cv, 
            'image_transkrip' => $path_cv
        ]);

        $registrasis = Dokumen::where('nim_mhs', $mahasiswa->nim)->get();
        return view('Pengguna.unggah_dokumen', compact('registrasis'));
    }

    public function daftar_confirmation(Beasiswa $beasiswa) 
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $mahasiswas = Mahasiswa::where('nim', $mahasiswa->nim)->get();
        $dokumens = Dokumen::where('nim_mhs', $mahasiswa->nim)->get();
        
        return view('Pengguna.daftar_confirmation', compact('mahasiswas', 'dokumens', 'beasiswa'));
    }
 
    public function submit_registrasi(Beasiswa $beasiswa)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $image_cv = Dokumen::where('nim_mhs', $mahasiswa->nim)->value('image_cv');
        $image_transkrip= Dokumen::where('nim_mhs', $mahasiswa->nim)->value('image_transkrip');

        Registrasi::create([
            'beasiswa_id' => $beasiswa->id,
            'nama_beasiswa' => $beasiswa->namaBeasiswa,
            'nim_mhs' => $mahasiswa->nim,
            'nama_mhs' => $mahasiswa->name,
            'image_cv' => $image_cv, 
            'image_transkrip' => $image_transkrip 
        ]);

        return redirect()->route('show_kegiatanku');
    }

    public function show_kegiatanku()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $registrasis = Registrasi::where('nim_mhs', $mahasiswa->nim)->get();
        return view('Pengguna.kegiatanku', compact('registrasis'));
    }

    public function acc_beasiswa() 
    {
        $mitra = Auth::guard('mitra')->user();
        $mitra_id = $mitra->id;
        $pelamars = Registrasi::where('beasiswa_id', $mitra_id)->get();
        return view('Pengguna.acc_beasiswa', compact('pelamars'));
    }


    public function confirm_beasiswa(Registrasi $registrasi)
    {
        $registrasi->update([
            'status' => 'accepted'
        ]);

        return Redirect::back();
    }

    
}

