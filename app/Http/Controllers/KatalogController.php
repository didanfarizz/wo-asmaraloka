<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KatalogController extends Controller
{
    /**
     * Tampilkan semua katalog
     */
    public function index()
    {
        $katalog = Catalogue::all();
        return view('admin.katalog.index', compact('katalog'));
    }

    /**
     * Form tambah katalog
     */
    public function create()
    {
        return view('admin.katalog.create');
    }

    /**
     * Simpan katalog baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:256',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'status_publish' => 'required|in:Y,N',
            'image' => 'required|string|max:100', // nama file gambar
        ]);

        Catalogue::create([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
            'status_publish' => $request->status_publish,
            'user_id' => 1,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.katalog.index')->with('success', 'Katalog berhasil ditambahkan.');
    }

    /**
     * Form edit katalog
     */
    public function edit($id)
    {
        $katalog = Catalogue::findOrFail($id);
        return view('admin.katalog.edit', compact('katalog'));
    }

    /**
     * Update katalog
     */
    public function update(Request $request, $id)
    {
        $katalog = Catalogue::findOrFail($id);

        $request->validate([
            'package_name' => 'required|string|max:256',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'status_publish' => 'required|in:Y,N',
            'image' => 'required|string|max:100', // nama file gambar
        ]);

        $katalog->update([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
            'status_publish' => $request->status_publish,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.katalog.index')->with('success', 'Katalog berhasil diupdate.');
    }

    /**
     * Hapus katalog
     */
    public function destroy($id)
    {
        $katalog = Catalogue::findOrFail($id);
        $katalog->delete();

        return redirect()->route('admin.katalog.index')->with('success', 'Katalog berhasil dihapus.');
    }
}
