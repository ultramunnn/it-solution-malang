<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function create(Service $service)
    {
        return view('orders.create', compact('service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'notes' => 'nullable|string',
        ]);

        ServiceOrder::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'notes' => $request->notes,
            'status' => 'Menunggu Konfirmasi',
        ]);

        return redirect()->route('order.customer.index')->with('success', 'Layanan berhasil dipesan! Silakan tunggu konfirmasi dari teknisi.');
    }

    public function indexCustomer()
    {
        $orders = Auth::user()->serviceOrders()->with('service')->latest()->paginate(10);
        return view('orders.customer_index', compact('orders'));
    }

    // --- LOGIKA UNTUK TEKNISI & ADMIN ---

    public function indexAdmin()
    {
        $orders = ServiceOrder::with(['user', 'service'])->latest()->paginate(10);
        return view('orders.admin_index', compact('orders'));
    }

    public function edit(ServiceOrder $order)
    {
        $statuses = ['Menunggu Konfirmasi', 'Sedang Diproses', 'Selesai', 'Dibatalkan'];
        return view('orders.admin_edit', compact('order', 'statuses'));
    }

    public function update(Request $request, ServiceOrder $order)
    {
        $request->validate([
            'status' => 'required|string|in:Menunggu Konfirmasi,Sedang Diproses,Selesai,Dibatalkan',
            'estimated_finish_date' => 'nullable|date',
            'additional_cost' => 'nullable|numeric|min:0',
        ]);

        $order->update([
            'status' => $request->status,
            'estimated_finish_date' => $request->estimated_finish_date,
            'additional_cost' => $request->additional_cost ?? 0, 
        ]);

        return redirect()->route('order.admin.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
