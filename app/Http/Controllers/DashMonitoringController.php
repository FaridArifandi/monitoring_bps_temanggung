<?php

namespace App\Http\Controllers;

use App\Models\DashMonitoring;
use App\Models\TimKerja;
use App\Http\Requests\Storedash_monitoringRequest;
use App\Http\Requests\Updatedash_monitoringRequest;

class DashMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Memuat semua data TimKerja tanpa relasi
        $timKerjas = TimKerja::all();

        // Lazy eager loading: muat relasi kinerjas hanya ketika dibutuhkan
        $timKerjas->load('kinerjas');

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
    public function show(DashMonitoring $dash_monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashMonitoring $dash_monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedash_monitoringRequest $request, DashMonitoring $dash_monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashMonitoring $dash_monitoring)
    {
        //
    }
}
