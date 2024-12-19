<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari tabel about
        $about = About::all();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk menambahkan data
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan data ke tabel about
        $about = new About();
        $about->title = $request->title;
        $about->description = $request->description;

        // Simpan file gambar jika ada
        if ($request->hasFile('image')) {
            $about->image = $request->file('image')->store('images', 'public');
        }

        // Simpan data ke database
        $about->save();

        // Arahkan ke halaman index dengan pesan sukses
        return redirect()->route('about.index')->with('success', 'About berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        // Tampilkan form edit dengan data yang akan diedit
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Perbarui data sesuai input
        $about->title = $request->title;
        $about->description = $request->description;

        // Periksa apakah ada file baru, jika ada hapus file lama dan simpan yang baru
        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::delete('public/' . $about->image);
            }
            $about->image = $request->file('image')->store('images', 'public');
        }

        // Simpan perubahan ke database
        $about->save();

        // Arahkan ke halaman index dengan pesan sukses
        return redirect()->route('about.index')->with('success', 'About berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about): RedirectResponse
    {
        // Hapus file gambar jika ada
        if ($about->image) {
            Storage::delete('public/' . $about->image);
        }

        // Hapus data dari tabel about
        $about->delete();

        // Arahkan ke halaman index dengan pesan sukses
        return redirect()->route('about.index')->with('success', 'About berhasil dihapus!');
    }
}
