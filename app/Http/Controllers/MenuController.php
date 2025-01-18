<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini

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

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
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
            $destinationPath = public_path('image'); // Path ke public/image
            $image->move($destinationPath, $imageName); // Simpan di public/image
            $menu->gambar = $imageName;
        }
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
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
            // Delete the old image if exists
            if($menu->gambar){
               $oldImagePath = public_path('image/' . $menu->gambar);
               if(File::exists($oldImagePath)){
                    File::delete($oldImagePath);
               }
            }
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('image');
            $image->move($destinationPath, $imageName);
            $menu->gambar = $imageName;
        }

        $menu->save();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy($id)
    {
       $menu = Menu::findOrFail($id);
       if($menu->gambar){
        $oldImagePath = public_path('image/' . $menu->gambar);
        if(File::exists($oldImagePath)){
             File::delete($oldImagePath);
        }
      }
       $menu->delete();
       return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
   }
}
