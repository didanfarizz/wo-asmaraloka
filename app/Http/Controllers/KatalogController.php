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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // nama file gambar
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        Catalogue::create([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
            'status_publish' => $request->status_publish,
            'user_id' => 1,
            'image' => $imageName,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // nama file gambar
        ]);

        $imageName = $katalog->image;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $newImageName = time() . '_' . $imageFile->getClientOriginalName();
            if ($katalog->image && file_exists(public_path('images/' . $katalog->image))) {
                unlink(public_path('images/' . $katalog->image));
            }
            $imageFile->move(public_path('images'), $newImageName);
            $imageName = $newImageName; // Update nama file yang akan disimpan ke DB
        }

        $katalog->update([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
            'status_publish' => $request->status_publish,
            'image' => $imageName,
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
