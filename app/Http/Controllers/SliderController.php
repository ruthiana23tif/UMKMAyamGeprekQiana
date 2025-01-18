<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }


    public function dashboard()
{
    // Contoh logika dashboard
    $sliders = Slider::all();
    return view('dashboard', compact('sliders'));
}

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $sliders = new Slider();
        $sliders->judul = $request->judul;
        $sliders->isi_berita = $request->isi_berita;

        if ($request->hasFile('gambar')){
            $sliders->gambar = $request->file('gambar')->store('images', 'public');

        }
        $sliders->save();
        return redirect()->route('sliders.index')->with('Success', 'Berita berhasil dikirimkan!');
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($slider->gambar);

            $slider->gambar = $request->file('gambar')->store('sliders', 'public');
        }

        $slider->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider berhasil diperbarui!');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->gambar) {
            Storage::disk('public')->delete($slider->gambar);
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider berhasil dihapus!');
    }
}
