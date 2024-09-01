<?php

namespace App\Http\Controllers;

use App\Models\DashMonitoring;
use App\Models\TimKerja;
use App\Models\TabKinerja;
use Illuminate\Http\Request;
use App\Http\Requests\Storedash_monitoringRequest;
use App\Http\Requests\Updatedash_monitoringRequest;

class DashMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil tahun dan bulan dari request
        $year = $request->input('year');
        $month = $request->input('month');

        // Mengambil data tahun yang tersedia di database
        $years = TabKinerja::selectRaw('YEAR(start_date) as year')
            ->distinct()
            ->pluck('year');

        // Daftar bulan
        $months = [
            ['number' => '01', 'name' => 'Januari'],
            ['number' => '02', 'name' => 'Februari'],
            ['number' => '03', 'name' => 'Maret'],
            ['number' => '04', 'name' => 'April'],
            ['number' => '05', 'name' => 'Mei'],
            ['number' => '06', 'name' => 'Juni'],
            ['number' => '07', 'name' => 'Juli'],
            ['number' => '08', 'name' => 'Agustus'],
            ['number' => '09', 'name' => 'September'],
            ['number' => '10', 'name' => 'Oktober'],
            ['number' => '11', 'name' => 'November'],
            ['number' => '12', 'name' => 'Desember'],
        ];

        // Memfilter data berdasarkan bulan dan tahun dengan mengecek apakah range tanggal sesuai
        $timKerjas = TimKerja::with(['kinerjas' => function ($query) use ($year, $month) {
            $query->when($year && $month, function ($query) use ($year, $month) {
                $query->where(function ($query) use ($year, $month) {
                    $query->whereYear('start_date', '<=', $year)
                        ->whereYear('end_date', '>=', $year)
                        ->whereMonth('start_date', '<=', $month)
                        ->whereMonth('end_date', '>=', $month);
                });
            });
        }])->get();

        // Menghitung target dan realisasi
        $dataMonitoring = $timKerjas->map(function ($tim) {
            $target = $tim->kinerjas->count();
            $realisasi = $tim->kinerjas->filter(function ($kinerja) {
                return $kinerja->realisasi >= $kinerja->target;
            })->count();

            return [
                'nama_tim' => $tim->nama_tim,
                'target' => $target,
                'realisasi' => $realisasi,
            ];
        });

        return view('dashboard.index', compact('dataMonitoring', 'years', 'months', 'year', 'month'));
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
