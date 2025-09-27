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
}
