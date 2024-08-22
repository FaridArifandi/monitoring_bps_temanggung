<?php

namespace App\Http\Controllers;

use App\Models\TabKinerja;
use Illuminate\Http\Request;
use App\Http\Requests\Storetab_kinerjaRequest;
use App\Http\Requests\Updatetab_kinerjaRequest;


class TabKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil tahun dan bulan dari request
        $year = $request->input('year');
        $month = $request->input('month');

        // Mengambil data tahun dan bulan yang tersedia di database
        $years = TabKinerja::selectRaw('YEAR(start_date) as year')
            ->distinct()
            ->pluck('year');
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
        $kinerjaData = TabKinerja::with('timKerja') // Eager loading untuk relasi 'timKerja'
            ->when($year && $month, function ($query) use ($year, $month) {
                return $query->where(function ($query) use ($year, $month) {
                    $query->whereYear('start_date', '<=', $year)
                        ->whereYear('end_date', '>=', $year)
                        ->whereMonth('start_date', '<=', $month)
                        ->whereMonth('end_date', '>=', $month);
                });
            })
            ->paginate(10);

        // Cek rute yang sedang diakses dan arahkan ke view yang sesuai
        if ($request->is('target_kinerja')) {
            return view('pages.tabkinerja', compact('kinerjaData', 'years', 'months', 'year', 'month'));
        } elseif ($request->is('realisasi')) {
            return view('pages.realisasi', compact('kinerjaData', 'years', 'months', 'year', 'month'));
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
