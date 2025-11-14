<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validatedData['image'] = $path;
        }
        Service::create($validatedData);
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function show(Service $layanan)
    {
        return view('services.show', compact('layanan'));
    }

    public function edit(Service $layanan)
    {
        return view('services.edit', compact('layanan'));
    }

    public function update(Request $request, Service $layanan)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($layanan->image) {
                Storage::disk('public')->delete($layanan->image);
            }
            $path = $request->file('image')->store('services', 'public');
            $validatedData['image'] = $path;
        }
        $layanan->update($validatedData);
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Service $layanan)
    {
        if ($layanan->image) {
            Storage::disk('public')->delete($layanan->image);
        }
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
