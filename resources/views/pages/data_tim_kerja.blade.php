@extends('layouts.main')


@section('body')
    <h1>Halaman tim kerja</h1><br>
    <!-- Legend Indicator -->
    <div class="flex justify-center sm:justify-end items-center gap-x-4 mb-3 sm:mb-6">
        <div class="inline-flex items-center">
            <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>
            <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                Income
            </span>
        </div>
        <div class="inline-flex items-center">
            <span class="size-2.5 inline-block bg-gray-300 rounded-sm me-2 dark:bg-neutral-700"></span>
            <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                Outcome
            </span>
        </div>
    </div>
    <!-- End Legend Indicator -->

    <div id="hs-multiple-bar-charts"></div>

    <script src="./node_modules/lodash/lodash.min.js"></script>
    <script src="./node_modules/apexcharts/dist/apexcharts.min.js"></script>
@endsection
