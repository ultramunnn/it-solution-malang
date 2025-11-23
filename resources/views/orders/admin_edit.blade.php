@extends('components.layouts.dashboard')
@section('title', 'Edit Status Pesanan')
@section('page-title', 'Edit Status Pesanan')

@section('content')
<div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
    <div class="max-w-xl">
        <header>
            <h2 class="text-lg font-medium">Pesanan #{{ $order->id }}</h2>
            <p class="mt-1 text-sm text-gray-600">Customer: {{ $order->user->name }}</p>
            <p class="mt-1 text-sm text-gray-600">Layanan: {{ $order->service->name }}</p>
        </header>
        <form method="POST" action="{{ route('order.admin.update', $order) }}" class="mt-6 space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="status" class="block font-medium text-sm text-gray-700">Ubah Status</label>
                <select id="status" name="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">
                    @foreach($statuses as $status)
                    <option value="{{ $status }}" @if($status==$order->status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="estimated_finish_date" class="block font-medium text-sm text-gray-700">Estimasi Selesai</label>
                <input type="date" id="estimated_finish_date" name="estimated_finish_date" value="{{ old('estimated_finish_date', $order->estimated_finish_date) }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 ...">
                @error('estimated_finish_date')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="additional_cost" class="block font-medium text-sm text-gray-700">Biaya Tambahan (Rp)</label>
                <input type="number" id="additional_cost" name="additional_cost" step="1000" value="{{ old('additional_cost', $order->additional_cost) }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 ...">
                @error('additional_cost')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3">Update Pesanan</button>
                <a href="{{ route('order.admin.index') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
