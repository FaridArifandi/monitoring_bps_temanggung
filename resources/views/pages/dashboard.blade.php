@extends('layouts.main')


@section('body')
    <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

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
