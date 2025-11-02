<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //list semua layanan (bisa filter by teknisi)
    public function index(Request $request)
    {
        $query = Service::with('technician');

        if ($request->has('technician_id')) {
            $query->where('technician_id', $request->technician_id);

            return response()->json($query->get());
        }

        return view('dashboard.teknisi.layanan.index', [
            'service' => $query->latest()->get()
        ]);

    }

    //form tambah service
    public function create()
    {
        return view('dashboard.teknisi.layanan.create');
    }

    //Buat layanan baru (hanya teknsi)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_estimate' => 'required|string|max:100',
            'image' => 'nullable|image|max:2048|mimes:jpg,png,jpeg',
        ]);

        $imagePath = $request->file('image')
            ? $request->file('image')->store('layanan', 'public') : null;

        $service = Service::create([
            'technician_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'duration_estimate' => $request->duration_estimate,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dibuat.');
    }

    //Tampilkan detail sevice
    public function show(Service $service)
    {
        return response()->json(($service->load('technician')));
    }


    //edit form
    public function edit(Service $service)
    {
        if ($service->technician_id != Auth::id()) {
            abort(403);
        }

        return view('dashboard.teknisi.layanan.edit', ['layanan' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        if ($service->technician_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes',
            'price' => 'sometimes|numeric|min:0',
            'duration_estimate' => 'sometimes|string|max:100',
            'image' => 'nullable|image|max:2048|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $imagePath = $request->file('image')->store('layanan', 'public');
            $service->image = $imagePath;
        }

        $service->update($request->only(['title', 'description', 'price', 'duration_estimate']));

        if (isset($imagePath)) {
            $service->image = $imagePath;
            $service->save();
        }

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }


    //Hapus layanan (hanya teknisi)
    public function destroy(Service $service)
    {
        if ($service->technician_id != Auth::id()) {
            return response()->json(['message' => 'Unautorized'], 403);
        }

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();
        return redirect()->route('layanan.index')->with('success', 'layanan berhasil dihapus.');
    }
}