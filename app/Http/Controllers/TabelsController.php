<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabels;

class TabelsController extends Controller
{
    public function KinerjaData(){
        return view('pages.target_kinerja', [
            'data' => Tabels::getKinerjaData()
        ]);
    }

    public function TimKerja(){
        return view('pages.data_tim_kerja', [
            'data' => Tabels::getTimData()
        ]);
    }

    public function Realisasi(){
        return view('pages.realisasi', [
            'data' => Tabels::getKinerjaData()
        ]);
    }
}
