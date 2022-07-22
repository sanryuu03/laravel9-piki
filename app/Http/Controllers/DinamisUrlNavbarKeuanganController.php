<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SumbanganPiki;
use App\Models\DinamisUrlNavbarKeuangan;

class DinamisUrlNavbarKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\DinamisUrlNavbarKeuangan  $dinamisUrlNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(DinamisUrlNavbarKeuangan $dinamisUrlNavbarKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DinamisUrlNavbarKeuangan  $dinamisUrlNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(DinamisUrlNavbarKeuangan $dinamisUrlNavbarKeuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DinamisUrlNavbarKeuangan  $dinamisUrlNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DinamisUrlNavbarKeuangan $dinamisUrlNavbarKeuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DinamisUrlNavbarKeuangan  $dinamisUrlNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DinamisUrlNavbarKeuangan $dinamisUrlNavbarKeuangan)
    {
        //
    }

    public function dinamisUrlNavbarKeuangan(Request $request, $masterMenu ,$subMenu)
    {
        // echo 'hehehe';
        // return $request;
        // return $masterMenu;
        // return response()->json([$masterMenu, $subMenu]);
        // return $id;
        $user = auth()->user()->id;
        $rekapSumbangan = SumbanganPiki::get();
        return view('admin/dinamisKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('Pemasukan'. $subMenu .'PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
            'subMenu' => $subMenu,
        ]);
    }
}
