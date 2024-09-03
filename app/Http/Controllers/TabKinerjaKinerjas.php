<?php

namespace App\Http\Controllers;

use App\Models\TabKinerja;
use Illuminate\Http\Request;

class TabKinerjaKinerjas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'nama_kegiatan' => 'required',
            'tim_kerja_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'target' => 'required',
            'satuan' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        TabKinerja::create($validatedData);

        return redirect ('/target_kinerja')->with('succes','Target berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TabKinerja $tabKinerja)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TabKinerja $tabKinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TabKinerja $tabKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TabKinerja $tabKinerja)
    {
        TabKinerja::destroy($tabKinerja->id);

        return redirect ('/target_kinerja')->with('succes','Target berhasil dihapus!');
    }
}
