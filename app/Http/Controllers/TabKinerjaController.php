<?php

namespace App\Http\Controllers;

use App\Models\TabKinerja;
use App\Http\Requests\Storetab_kinerjaRequest;
use App\Http\Requests\Updatetab_kinerjaRequest;
use App\Models\TimKerja;


class TabKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kinerjaData = TabKinerja::with('tim_Kerja')->get();

        // Cek URL yang diakses untuk menentukan view mana yang harus digunakan
        if (request()->is('target_kinerja')) {
            return view('pages.target_kinerja', compact('kinerjaData'));
        } elseif (request()->is('realisasi')) {
            return view('pages.realisasi', compact('kinerjaData'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetab_kinerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TabKinerja $tab_kinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TabKinerja $tab_kinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetab_kinerjaRequest $request, TabKinerja $tab_kinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TabKinerja $tab_kinerja)
    {
        //
    }
}
