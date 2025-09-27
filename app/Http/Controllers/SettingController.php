<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:256',
            'email' => 'required|email|max:80',
            'address' => 'nullable|string',
            'instagram_url' => 'nullable|url|max:256',
            'whatsapp_url' => 'nullable|url|max:256',
        ]);

        Setting::create($request->all());

        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil dibuat.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'phone_number' => 'required|string|max:256',
            'email' => 'required|email|max:80',
            'address' => 'nullable|string',
            'instagram_url' => 'nullable|url|max:256',
            'whatsapp_url' => 'nullable|url|max:256',
        ]);

        $setting->update($request->all());

        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil diupdate.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil dihapus.');
    }
}

