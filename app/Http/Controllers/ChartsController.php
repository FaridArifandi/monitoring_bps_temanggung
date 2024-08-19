<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charts;

class ChartsController extends Controller
{
    public function DummyData(){
        return view('pages.dashboard', [
            'chartData' => Charts::getDummyData()
        ]);
    }
}
