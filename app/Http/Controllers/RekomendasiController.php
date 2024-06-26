<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\SuratRekomendasi;
use App\Models\Mahasiswa;


class RekomendasiController extends Controller
{

    public function index_rekomendasi()
    {
        $rekomendasis = SuratRekomendasi::all();
        return view('Pengguna.index_rekomendasi', compact('rekomendasis'));
    }

    public function show_rekomendasi()
    {
        $user = Auth::user();
        $rekomendasis = SuratRekomendasi::where('nim_mhs', $user->nim)->get();
        return view('Pengguna.rekomendasi', compact('rekomendasis'));
    }

    public function submit_rekomendasi(SuratRekomendasi $rekomendasi)
    {
        $mahasiswa = Auth::user();
        $rekomendasi = SuratRekomendasi::create([
            'nim_mhs' => $mahasiswa->nim,
            'nama_mhs' => $mahasiswa->name
        ]);

        return Redirect::back();
    }

    public function confirm_rekomendasi(SuratRekomendasi $rekomendasi)
    {
        $rekomendasi->update([
            'is_rekomendasi' => true
        ]);

        return Redirect::back();
    }

}
