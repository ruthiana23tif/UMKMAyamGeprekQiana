<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $menus = Menu::when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
             })->get();


        return view('menu.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = new Menu();
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;

        if ($request->hasFile('gambar')) {
           $image = $request->file('gambar');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->storeAs('public', $imageName);
           $menu->gambar = $imageName;
        }
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
         $menu = Menu::findOrFail($id);
         return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;

         if ($request->hasFile('gambar')) {
            if($menu->gambar && file_exists(storage_path('app/public/' . $menu->gambar))){
                unlink(storage_path('app/public/' . $menu->gambar));
            }
           $image = $request->file('gambar');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->storeAs('public', $imageName);
           $menu->gambar = $imageName;
        }
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
         if($menu->gambar && file_exists(storage_path('app/public/' . $menu->gambar))){
                unlink(storage_path('app/public/' . $menu->gambar));
             }
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
