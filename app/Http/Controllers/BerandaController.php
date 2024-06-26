<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() 
    {
        return view('HalamanDepan.beranda');
    }

    public function pageOne() 
    {
        return view('Pages.page-one');
    }

    public function pageTwo()
    {
        return view('Pages.page-two');
    }

    public function pageThree()
    {
        return view('Pages.page-three');
    }

    
}
