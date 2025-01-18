<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\Geser;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data testimoni
        $testimonis = Testimoni::all();
        $geser = Geser::all();

        // Kirim data ke view
        return view('welcome', compact('testimonis', 'geser'));
    }
}
