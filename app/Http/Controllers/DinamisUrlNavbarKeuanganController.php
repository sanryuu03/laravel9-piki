<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\SumbanganPiki;
use App\Models\DinamisUrlNavbarKeuangan;
use App\Models\Pendapatan;

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
        // return $masterMenu;
        return view('admin/dinamisKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('Pemasukan'. $subMenu .'PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'rekapSumbangan' => $rekapSumbangan,
            'masterMenu' => $masterMenu,
            'subMenu' => $subMenu,
        ]);
    }

    public function dinamisIsiMenuKeuanganBaru($masterMenu, $subMenu)
    {
        $user = auth()->user()->id;
        if ($masterMenu == 'pemasukan') {
            // return $masterMenu;
            $pendapatan = Pendapatan::where('jenis_pendapatan', $subMenu)->get();
            return view('admin/pemasukanDinamisBaru', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('pendapatan '.$subMenu. ' Baru'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'pendapatan' => $pendapatan,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
            ]);
        }
        else {
            $Pengeluaran = Pengeluaran::where('pos_anggaran', $subMenu)->get();
            return view('admin/pengeluaranDinamisBaru', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('Pengeluaran '.$subMenu. ' Baru'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'Pengeluaran' => $Pengeluaran,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
                ]);
        }
    }

    public function dinamisIsiMenuKeuanganDiproses($masterMenu, $subMenu)
    {
        $user = auth()->user()->id;
        $Pengeluaran = Pengeluaran::where('status_pengeluaran', 'pengeluaran diproses')->get();
        return view('admin/pengeluaranDinamisDiproses', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('Pengeluaran '.$subMenu. ' diproses'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'subMenu' => $subMenu,
            ]);
    }
}
