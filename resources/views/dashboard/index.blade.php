@extends('layouts.main')

@section('body')
<div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Dashboard Monitoring Kinerja</h2>

    <div class="flex items-center space-x-4 mb-4">
        <label for="year-filter" class="text-sm font-medium text-gray-900 dark:text-white">Tahun:</label>
        <select id="year-filter" name="year" class="border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white">
            <option value="">Semua Tahun</option>
            @foreach ($years as $yearOption)
                <option value="{{ $yearOption }}" {{ $year == $yearOption ? 'selected' : '' }}>
                    {{ $yearOption }}
                </option>
            @endforeach
        </select>

        <label for="month-filter" class="text-sm font-medium text-gray-900 dark:text-white">Bulan:</label>
        <select id="month-filter" name="month" class="border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white">
            <option value="">Semua Bulan</option>
            @foreach ($months as $monthOption)
                <option value="{{ $monthOption['number'] }}" {{ $month == $monthOption['number'] ? 'selected' : '' }}>
                    {{ $monthOption['name'] }}
                </option>
            @endforeach
        </select>
        <button id="filter-button" class="flex items-center justify-center w-10 h-10 rounded-full focus:ring-4 focus:outline-bold focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-black">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>
        </button>
    </div>

    <div id="column-chart"></div>

    <script>
        // Data chart diambil dari PHP dan dikonversi ke JSON
        const chartData = {!! json_encode($dataMonitoring) !!};

        document.getElementById('filter-button').addEventListener('click', function() {
            const year = document.getElementById('year-filter').value;
            const month = document.getElementById('month-filter').value;
            window.location.href = `?year=${year}&month=${month}`;
        });
    </script>

    <script src="{{ asset('js/barchart.js') }}"></script>
</div>
@endsection
