<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Data untuk principles yang akan ditampilkan di view
        $about= [
            [
                'title' => 'Tentang',
                'description' => 'pengenalan UMKM.',
            ],
        ];

        // Return view dengan data
        return view('Tentang.about', compact('about'));
    }
}
