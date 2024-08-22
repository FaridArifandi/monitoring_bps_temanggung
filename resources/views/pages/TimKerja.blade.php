@extends('layouts.main')


@section('body')
    @include('partials.TableTimKerja')
    @if($data->isEmpty())
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
            <td class="px-6 py-4" colspan="10">no data</td>
        </tr>
    @endif
@endsection
