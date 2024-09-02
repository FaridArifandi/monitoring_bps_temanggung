<?php

namespace App\Http\Controllers;

use App\Models\TabKinerja;
use App\Models\TimKerja;
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

        $timKerjaOptions = TimKerja::all();

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
            return view('pages.tabkinerja', compact('kinerjaData', 'years', 'timKerjaOptions', 'months', 'year', 'month'));
        } elseif ($request->is('realisasi')) {
            return view('pages.realisasi', compact('kinerjaData', 'years', 'timKerjaOptions', 'months', 'year', 'month'));
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
        $validated = $request->validated();

        // Menyimpan data ke dalam database
        $tabKinerja = new TabKinerja();
        $tabKinerja->nama_kegiatan = $validated['nama_kegiatan'];
        $tabKinerja->tim_kerja_id = $validated['tim_kerja_id'];
        $tabKinerja->start_date = $validated['start_date'];
        $tabKinerja->end_date = $validated['end_date'];
        $tabKinerja->target = $validated['target'];
        $tabKinerja->realisasi = $validated['realisasi'];
        $tabKinerja->satuan = $validated['satuan'];
        $tabKinerja->link_bukti_dukung = $validated['link_bukti_dukung'];
        $tabKinerja->keterangan = $validated['keterangan'];

        $tabKinerja->save();

        return redirect()->route('target_kinerja')->with('success', 'Data kinerja berhasil ditambahkan');
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
    public function edit($id)
    {
        $kinerja = TabKinerja::findOrFail($id);
        $timKerjaOptions = TimKerja::all(); // Mengambil semua data Tim Kerja

        return view('nama_view', compact('kinerja', 'timKerjaOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetab_kinerjaRequest $request, TabKinerja $tab_kinerja)
    {
        $validated = $request->validated();

        // Mengupdate data yang ada di database
        $tab_kinerja->update($validated);

        return redirect()->route('target_kinerja')->with('success', 'Data kinerja berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TabKinerja $tab_kinerja)
    {
        $tab_kinerja->delete();

        return redirect()->route('target_kinerja')->with('success', 'Data kinerja berhasil dihapus');
    }
}
