<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    /**
     * Halaman dashboard admin
     */
    public function dashboard()
    {
        return view('admin.dashboard');
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
}
