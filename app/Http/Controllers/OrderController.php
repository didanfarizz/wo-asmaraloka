<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'event_date' => 'required|date',
        ]);

        Order::create([
            'catalogue_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'wedding_date' => $request->event_date,
            'status' => 'requested',
            'user_id' => 0, // untuk user publik
        ]);

        return redirect()->route('home')->with('success', 'Pemesanan berhasil dikirim.');
    }

    public function index()
    {
        $orders = Order::with('catalogue')->latest()->get();
        return view('admin.pemesanan.index', compact('orders'));
    }

    /**
     * Menyetujui status pesanan (Aksi Admin)
     */
    public function approveOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'approved';
        $order->save();

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pesanan berhasil disetujui.');
    }
    
    /**
     * Hapus pesanan (Aksi Admin)
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect()->route('admin.pemesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
    
    /**
     * Memproses pencarian pesanan oleh user (Cek Pesanan)
     */
    public function checkOrder(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $email = $request->email;

        // Ambil semua pesanan berdasarkan email, bersama data katalog
        $orders = Order::where('email', $email)
                       ->with('catalogue')
                       ->latest()
                       ->get();

        // Kirim hasil pencarian kembali ke view cekpesanan
        return view('user.cekpesanan', compact('orders', 'email'));
    }
    
    // Anda mungkin perlu method show($id) juga untuk detail pesanan admin
    public function show($id)
    {
        $order = Order::with('catalogue')->findOrFail($id);
        return view('admin.pemesanan.show', compact('order')); // Asumsi Anda punya view show
    }
}
