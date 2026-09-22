@extends('master')
@section('header')
    {{ __('Dashboard') }}
@endsection
@section('content')
    {{-- {{ __("You're logged in!") }} --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    This Month's Income
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    This Month's Expenses
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Remaining balance
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    Rp {{ number_format($sisaSaldo ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-lg font-semibold mb-4">Latest transactions</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Category</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Description</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Amount</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($recentTransactions ?? [] as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $transaction->category->name ?? 'Uncategorized' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ $transaction->description ?? '-' }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-right font-bold {{ $transaction->type == 'pemasukan' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $transaction->type == 'pemasukan' ? '+' : '-' }} Rp
                                        {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 dark:text-gray-400">
                                        There are no transactions this month.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
