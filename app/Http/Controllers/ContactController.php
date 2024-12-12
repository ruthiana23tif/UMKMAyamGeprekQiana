<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar kontak.
     */
    public function index()
    {
        $contacts = Contact::all(); // Mengambil semua data kontak
        return view('contacts.index', compact('contacts')); // Mengirimkan ke view
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk membuat kontak baru.
     */
    public function create()
    {
        return view('contacts.create'); // Mengembalikan form untuk membuat kontak
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data kontak baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create($request->all()); // Menyimpan data kontak
        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     * Menampilkan detail kontak tertentu.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact')); // Menampilkan detail kontak
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit kontak tertentu.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact')); // Form edit
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data kontak tertentu di database.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $contact->update($request->all()); // Memperbarui data kontak
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus kontak tertentu dari database.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete(); // Menghapus kontak
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
