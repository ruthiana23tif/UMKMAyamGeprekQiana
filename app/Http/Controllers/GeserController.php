<?php

namespace App\Http\Controllers;

use App\Models\Geser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeserController extends Controller
{
    public function index()
    {
        $geser = Geser::all();
        return view('geser.index', compact('geser'));
    }

    public function create()
    {
        return view('geser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'gambar.max' => 'Gambar hanya bisa menggunakan format jpeg, png, jpg, gif, atau svg dengan ukuran maksimal 2MB.'
        ]);

        $geser = new Geser();

        if ($request->hasFile('gambar')) {
            $geser->gambar = $request->file('gambar')->store('images', 'public');
        }

        $geser->save();
        return redirect()->route('geser.index')->with('success', 'Gambar berhasil diunggah!');
    }

    public function show(Geser $geser)
    {
        return view('geser.show', compact('geser'));
    }

    public function edit(Geser $geser)
    {
        return view('geser.edit', compact('geser'));
    }

    public function update(Request $request, Geser $geser)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'gambar.max' => 'Gambar hanya bisa menggunakan format jpeg, png, jpg, gif, atau svg dengan ukuran maksimal 2MB.'
        ]);

        if ($request->hasFile('gambar')) {
            if ($geser->gambar) {
                Storage::delete('public/' . $geser->gambar);
            }
            $geser->gambar = $request->file('gambar')->store('images', 'public');
        }

        $geser->save();

        return redirect()->route('geser.index')->with('success', 'Gambar berhasil diperbarui!');
    }

    public function destroy(Geser $geser)
    {
        if ($geser->gambar) {
            Storage::delete('public/' . $geser->gambar);
        }

        $geser->delete();
        return redirect()->route('geser.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
