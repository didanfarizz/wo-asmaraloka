<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Setting;

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

    public function pesanForm($id)
    {
        $item = Catalogue::findOrFail($id);
        return view('user.pesan', compact('item'));
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
        // Ambil settings terakhir, misal jika hanya satu row
        $setting = Setting::latest()->first();

        return view('user.kontak', compact('setting'));
    }

    public function cek()
    {
        $orders = collect([]);
        $email = null; 
        return view('user.cekpesanan', compact('orders', 'email'));
    }
}
