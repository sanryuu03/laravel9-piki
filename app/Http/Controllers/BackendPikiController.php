<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BackendPiki;
use Illuminate\Http\Request;

class BackendPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = auth()->user()->id;
        return view('admin/keuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'keuangan PIKI SUMUT',
            "creator" => $user,
        ]);
    }

    public function notFound()
    {
        $user = auth()->user()->id;
        return view('admin/notfound', [
            "title" => "PIKI - Sangrid CRUD",
            "creator" => $user
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
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function show(BackendPiki $backendPiki, $id)
    {
        $item = User::find($id);
        return view('admin/index', [
            "title" => "PIKI - Sangrid CRUD",
            "creator" => "San",
            "item" => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendPiki $backendPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendPiki $backendPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendPiki  $backendPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendPiki $backendPiki)
    {
        //
    }

    public function pemasukan()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Keuangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'iuran' => 'iuran',
            'sumbangan' => 'sumbangan',
        ]);
    }

    public function pemasukanSummary()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Keuangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'iuran' => 'iuran',
            'sumbangan' => 'sumbangan',
        ]);
    }
    public function pemasukanIuran()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Keuangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'iuran' => 'iuran',
            'sumbangan' => 'sumbangan',
        ]);
    }
    public function pemasukanSumbangan()
    {
        $user = auth()->user()->id;
        return view('admin/pemasukanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Keuangan PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'iuran' => 'iuran',
            'sumbangan' => 'sumbangan',
        ]);
    }

    public function pengeluaran()
    {
        $user = auth()->user()->id;
        return view('admin/pengeluaranKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Keuangan PIKI SUMUT',
            "creator" => $user,
            'pengeluaranBaru' => 'keuangan',
            'diproses' => 'iuran',
            'ditolak' => 'iuran',
            'terverifikasi' => 'iuran',
        ]);
    }

    public function laporanKeuangan()
    {
        $user = auth()->user()->id;
        return view('admin/laporanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Laporan Keuangan PIKI SUMUT',
            "creator" => $user,
            'keuangan' => 'keuangan',
            'iuran' => 'iuran',
        ]);
    }
}
