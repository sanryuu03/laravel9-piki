<?php

namespace App\Http\Controllers;

use App\Models\KategoriAnggota;
use Illuminate\Http\Request;

class KategoriAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriAnggota = KategoriAnggota::all();
        $user = auth()->user()->id;
        return view('admin/kategorianggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Kategori Berita",
            "creator" => $user,
            "kategoriAnggota" => $kategoriAnggota,
        ]);
    }

    public function addKategoriAnggota(KategoriAnggota $kategoriAnggota)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formkategorianggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Form Tambah Kategori Berita",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "kategoriAnggota" => $kategoriAnggota,
            "action" => 'add',
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
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriAnggota $kategoriAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriAnggota $kategoriAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriAnggota $kategoriAnggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriAnggota $kategoriAnggota)
    {
        //
    }
}
