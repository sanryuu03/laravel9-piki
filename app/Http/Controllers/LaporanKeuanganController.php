<?php

namespace App\Http\Controllers;

use App\Models\IuranPiki;
use App\Models\jenisPemasukan;
use App\Models\PosAnggaran;
use App\Models\NamaKegiatan;
use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;
use App\Models\MasterMenuNavbar;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use App\Models\SumbanganPiki;

class LaporanKeuanganController extends Controller
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
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKeuangan $laporanKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanKeuangan $laporanKeuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanKeuangan $laporanKeuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKeuangan  $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        //
    }

    public function laporanKeuangan(NamaKegiatan $namaKegiatan)
    {
        $user = auth()->user()->id;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        $laporanKeuangan = LaporanKeuangan::get();
        $jenisPemasukan = jenisPemasukan::get();
        // $iuran = IuranPiki::select();
        // $sumbangan = SumbanganPiki::first();

        $iuranPiki = IuranPiki::groupBy('jenis_setoran','tanggal')
        ->where('status', 'iuran terverifikasi')
        ->orWhere('status', 'sumbangan terverifikasi')
        ->selectRaw('tanggal,jenis_setoran, sum(jumlah) as sum')->whereMonth('tanggal',date('m'))
        ->get();

        $sumbangan = SumbanganPiki::where('status','sumbangan terverifikasi')->sum('jumlah');
        $pendapatan = Pendapatan::groupBy('jenis_pendapatan','tanggal')
        ->where('status', 'terverifikasi')
        ->selectRaw('tanggal,jenis_pendapatan, sum(jumlah) as sum')->whereMonth('tanggal',date('m'))
        ->get();

        $Pengeluaran = Pengeluaran::groupBy('pos_anggaran','tanggal')
        ->where('status_pengeluaran', 'pengeluaran terverifikasi')
        ->selectRaw('tanggal,pos_anggaran, sum(jumlah) as sum')->whereMonth('tanggal',date('m'))
        ->get();

        // return $Pengeluaran;
        // $sumbangan = SumbanganPiki::sum('jumlah');
        // dd($sumbangan);
        // dd($iuranPiki);
        // return $sumbangan->sum('jumlah');
        // return gettype(array_sum( explode( ',', $sumbangan->jumlah ) ));
        $arrJenisSetoran = [];
        foreach($laporanKeuangan as $laporan) {
            $namaPemasukan = $laporan->nama_pemasukan;
            array_push($arrJenisSetoran, $namaPemasukan);
        }
        // print_r($namaPemasukan);
        echo "\n";
        $clear_array_arrJenisSetoran = array_unique($arrJenisSetoran);
        return view('admin/laporanKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Laporan Keuangan PIKI SUMUT',
            "creator" => $user,
            'keuangan' => 'keuangan',
            'posAnggaran' => $masterMenuNavbarKeuangan,
            'namaKegiatan' => $namaKegiatan,
            'laporanKeuangan' => $laporanKeuangan,
            'pemasukan' => $clear_array_arrJenisSetoran,
            'jenisPemasukan' => $jenisPemasukan,
            'iuranPiki' => $iuranPiki,
            'sumbangan' => $sumbangan,
            'Pengeluaran' => $Pengeluaran,
            'pendapatan' => $pendapatan,
        ]);
    }
}
