<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Menampilkan halaman utama untuk pengunjung.
     */
    public function index()
    {
        // Pastikan Anda memiliki file view di: resources/views/welcome.blade.php
        return view('welcome');
    }
}
