@extends('master')
@section('header')
    {{ __('Transactions') }}
@endsection
@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-lg font-semibold mb-4">Create Transaction</h3>

            <div class="overflow-x-auto">
                <form 
                {{-- action="{{ route('transactions.store') }}"  --}}
                method="post">
                    @csrf

                    <div class="mb-4">
                        <label for="type" class="block font-medium text-sm">Jenis Transaksi</label>
                        <select id="type" name="type"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            required>
                            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Pilih Jenis</option>
                            <option value="pengeluaran" {{ old('type') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran
                            </option>
                            <option value="pemasukan" {{ old('type') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        </select>
                        @error('type')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="category_id" class="block font-medium text-sm">Kategori</label>
                        <select id="category_id" name="category_id"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            required>
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Pilih Kategori
                            </option>
                            <option value="">hooh</option>
                            <!-- Kita akan me-loop data kategori dari database -->
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach --}}
                        </select>
                        @error('category_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nominal -->
                    <div class="mb-4">
                        <label for="amount" class="block font-medium text-sm">Nominal (Rp)</label>
                        <input id="amount" type="number" name="amount" value="{{ old('amount') }}" min="1"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            required placeholder="Contoh: 15000">
                        @error('amount')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-4">
                        <label for="date" class="block font-medium text-sm">Tanggal</label>
                        <!-- Default value diisi tanggal hari ini jika belum ada input -->
                        <input id="date" type="date" name="date" value="{{ old('date', date('Y-m-d')) }}"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            required>
                        @error('date')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm">Keterangan
                            (Opsional)</label>
                        <input id="description" type="text" name="description" value="{{ old('description') }}"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            placeholder="Contoh: Beli makan siang">
                        @error('description')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end mt-6 gap-1">
                        <a href="{{ route('transaction') }}"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Simpan Transaksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
