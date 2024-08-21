<?php

namespace App\Http\Controllers;

use App\Models\TimKerja;
use App\Http\Requests\Storetim_kerjaRequest;
use App\Http\Requests\Updatetim_kerjaRequest;

class TimKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timKerjas = TimKerja::all();

        // Lazy eager load
        $timKerjas->load(['kinerjas', 'monitoringKegiatan']);

        return view('pages.data_tim_kerja', [
            'data' => $timKerjas
        ]);
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
    public function store(Storetim_kerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TimKerja $tim_kerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimKerja $tim_kerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetim_kerjaRequest $request, TimKerja $tim_kerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimKerja $tim_kerja)
    {
        //
    }
}
