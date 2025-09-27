<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;

class UserController extends Controller
{
    /**
     * Halaman home user
     */
    public function home()
    {
        $katalog = Catalogue::where('status_publish', 'Y')->get();
        return view('user.home', compact('katalog'));
    }

    public function show($id)
    {
        $item = Catalogue::findOrFail($id);
        return view('user.detail', compact('item'));
    }

    /**
     * Halaman profil user
     */
    public function kontak()
    {
        return view('user.kontak');
    }

    public function cek()
    {
        return view('user.cekpesanan');
    }
}
