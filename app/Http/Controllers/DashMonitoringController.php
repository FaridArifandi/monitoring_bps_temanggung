<?php

namespace App\Http\Controllers;

use App\Models\dash_monitoring;
use App\Models\tim_kerja;
use App\Http\Requests\Storedash_monitoringRequest;
use App\Http\Requests\Updatedash_monitoringRequest;

class DashMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timKerjas = tim_kerja::with('kinerjas')->get();

        $dataMonitoring = $timKerjas->map(function ($tim) {
            $target = $tim->kinerjas->count(); // Hitung jumlah kegiatan yang diikuti oleh tim
            $realisasi = $tim->kinerjas->filter(function ($kinerja) {
                return $kinerja->realisasi >= $kinerja->target; // Hitung kegiatan yang realisasinya memenuhi target
            })->count();

            return [
                'nama_tim' => $tim->nama_tim,
                'target' => $target,
                'realisasi' => $realisasi,
            ];
        });

        return view('pages.dashboard', compact('dataMonitoring'));
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
    public function store(Storedash_monitoringRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dash_monitoring $dash_monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dash_monitoring $dash_monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedash_monitoringRequest $request, dash_monitoring $dash_monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dash_monitoring $dash_monitoring)
    {
        //
    }
}
