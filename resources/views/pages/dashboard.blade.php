@extends('layouts.main')


@section('body')
    <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Dashboard Monitoring Kinerja</h2>

        <div id="column-chart"></div>

        <script>
            // Data chart diambil dari PHP dan dikonversi ke JSON
            const chartData = {!! json_encode($dataMonitoring) !!};
        </script>

        <script src="{{ asset('js/barchart.js') }}"></script>
    </div>
@endsection
