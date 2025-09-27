<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Halaman dashboard admin
     */
    public function dashboard()
    {
        $totalPaket = Catalogue::count(); // total paket
        $pesananBaru = Order::where('status', 'pending')->count(); // pesanan menunggu verifikasi
        $pesananDisetujui = \App\Models\Order::where('status', 'approved')
            ->with('catalogue')
            ->get()
            ->sum(function ($order) {
                return $order->catalogue->price; // ganti 'price' sesuai kolom harga di tb_katalog
            }); // total pendapatan
        $recentOrders = Order::with('catalogue')->orderBy('created_at', 'desc')->take(5)->get(); // pesanan terbaru

        return view('admin.dashboard', compact('totalPaket', 'pesananBaru', 'pesananDisetujui', 'recentOrders'));
    }

    /**
     * Halaman kelola pengguna
     */
    public function users()
    {
        return view('admin.users');
    }

    // Tampilkan semua pemesanan
    public function orders()
    {
        $orders = Order::with('catalogue')->orderBy('created_at', 'desc')->get();
        return view('admin.pemesanan.index', compact('orders'));
    }

    // Approve pemesanan
    public function approveOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'approved';
        $order->save();

        return redirect()->route('admin.pemesanan')->with('success', 'Pemesanan berhasil di-approve.');
    }

    public function destroyOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.pemesanan')
            ->with('success', 'Pemesanan berhasil dihapus.');
    }

    // Menampilkan halaman settings
    public function settings()
    {
        $setting = Setting::first(); // ambil setting pertama
        return view('admin.settings', compact('setting'));
    }

    // Menyimpan/update data settings
    public function updateSettings(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:256',
            'email' => 'required|email|max:80',
            'address' => 'nullable|string',
            'instagram_url' => 'nullable|url|max:256',
            'whatsapp_url' => 'nullable|url|max:256',
        ]);

        $setting = Setting::first();

        if ($setting) {
            // update
            $setting->update($request->all());
        } else {
            // buat baru
            Setting::create($request->all());
        }

        return redirect()->route('admin.settings')->with('success', 'Data setting berhasil disimpan.');
    }

    public function laporan(Request $request)
    {
        $query = Order::with('catalogue');

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter tanggal
        if ($request->filled('from')) {
            $query->whereDate('wedding_date', '>=', $request->from);
        }
        if ($request->filled('to')) {
            $query->whereDate('wedding_date', '<=', $request->to);
        }

        $orders = $query->orderBy('wedding_date', 'desc')->get();

        return view('admin.laporan.index', compact('orders'));
    }
}
