@extends('master')
@section('header')
    {{ __('Categories') }}
@endsection
@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-lg font-semibold mb-4">Create Category</h3>

            <div class="overflow-x-auto">
                <form action="/category/store" method="post">
                    @csrf

                    <div class="mb-4">
                        <label for="user_id" class="block font-medium text-sm">User</label>
                        <select id="user_id" name="user_id"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            required>
                            <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>Select user...
                            </option>
                            <!-- Kita akan me-loop data kategori dari database -->
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nominal -->
                    <div class="mb-4">
                        <label for="name" class="block font-medium text-sm">Name</label>
                        <input id="name" name="name" value="{{ old('name') }}" min="1"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700"
                            required placeholder="Insert category name...">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-6 gap-1">
                        <a href="{{ route('category') }}"
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
