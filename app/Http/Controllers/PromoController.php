<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promo = Promo::all();
        return view('promo.index', compact('promo'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $promo = new Promo($request->except('gambar'));

        if ($request->hasFile('gambar')) {
            $promo->gambar = $request->file('gambar')->store('images', 'public');
        }

        $promo->save();

        return redirect()->route('promo.index')->with('success', 'Promo berhasil ditambahkan.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promo)
    {
        return view('promo.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $promo->update($request->all());
        if ($request->hasFile('gambar')){
            if ($promo->gambar){
                Storage::delete('public/'. $promo->gambar);
            }
            $promo->gambar = $request->file('gambar')->store('images','public');
        }

        $promo->save();

        return redirect()->route('promo.index')->with('success', 'Promo berhasil diperbaharui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->route('promo.index')->with('success', 'Promo berhasil dihapus.');

    }
}
