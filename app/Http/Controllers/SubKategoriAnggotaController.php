<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAnggota;
use Illuminate\Http\Request;

class SubKategoriAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subKategoriAnggota = SubKategoriAnggota::all();
        $user = auth()->user()->id;
        return view('admin/kategorianggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Kategori Berita",
            "creator" => $user,
            "subKategoriAnggota" => $subKategoriAnggota,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(SubKategoriAnggota $subKategoriAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(SubKategoriAnggota $subKategoriAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubKategoriAnggota $subKategoriAnggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubKategoriAnggota $subKategoriAnggota)
    {
        //
    }
}
