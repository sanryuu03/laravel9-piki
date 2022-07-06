<?php

namespace App\Http\Controllers;

use App\Models\DataRekening;
use App\Models\SumbanganPiki;
use Illuminate\Http\Request;
use App\Models\Province;

class SumbanganPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $dataRekening = DataRekening::latest()->first();
        return view('sumbanganPiki', [
            "title" => "PIKI - Kategori Berita",
            "menu" => "Kategori Berita",
            "creator" => "San",
            'provinces' => $provinces,
            'dataRekening' => $dataRekening,
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
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function show(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumbanganPiki $sumbanganPiki)
    {
        //
    }
}
