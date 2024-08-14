@extends('layouts.main')


@section('body')
    <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <div class="grid grid-cols-2">
            <dl class="flex items-center">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Money spent:</dt>
                <dd class="text-gray-900 text-sm dark:text-white font-semibold">$3,232</dd>
            </dl>
            <dl class="flex items-center justify-end">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Conversion rate:</dt>
                <dd class="text-gray-900 text-sm dark:text-white font-semibold">1.2%</dd>
            </dl>
        </div>

        <div id="column-chart"></div>
        {{-- masukim sini --}}
        <script>
            const chartData = {!! json_encode($chartData) !!};
        </script>
        <script src="{{ asset('js/barchart.js') }}">
        </script>
        {{-- masukin sini --}}

    </div>
@endsection
