<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::all();
        return view('testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'testi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'gambar.max' => 'Gambar hanya bisa menggunakan format jpeg, png, jpg, gif, atau svg dengan ukuran maksimal 2MB.'
        ]);

        $testimoni = new Testimoni();
        $testimoni->nama = $request->nama;
        $testimoni->testi = $request->testi;

        if ($request->hasFile('gambar')) {
            $testimoni->gambar = $request->file('gambar')->store('testimoni', 'public');
        }

        $testimoni->save();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'testi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimoni->nama = $request->nama;
        $testimoni->testi = $request->testi;

        if ($request->hasFile('gambar')) {
            if ($testimoni->gambar) {
                Storage::delete('public/' . $testimoni->gambar);
            }
            $testimoni->gambar = $request->file('gambar')->store('testimoni', 'public');
        }

        $testimoni->save();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->gambar) {
            Storage::delete('public/' . $testimoni->gambar);
        }

        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
