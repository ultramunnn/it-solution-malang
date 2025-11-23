@extends('components.layouts.dashboard')
@section('title', 'Manajemen Pesanan')
@section('page-title', 'Manajemen Pesanan')

@section('content')
<div class="p-4 bg-white shadow-md rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Layanan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Pesan</th>
                <th class="relative px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($orders as $order)
                <tr>
                    <td class="px-6 py-4">{{ $order->user->name }}</td>
                    <td class="px-6 py-4">{{ $order->service->name }}</td>
                    <td class="px-6 py-4">{{ $order->status }}</td>
                    <td class="px-6 py-4">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right"><a href="{{ route('order.admin.edit', $order) }}" class="text-indigo-600 hover:text-indigo-900">Edit Status</a></td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada pesanan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $orders->links() }}</div>
</div>
@endsection