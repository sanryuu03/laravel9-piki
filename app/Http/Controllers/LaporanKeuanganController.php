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
// return date('m');
        $iuranPiki = IuranPiki::groupBy('jenis_setoran', 'tanggal')
            ->where('status', 'iuran terverifikasi')
            ->orWhere('status', 'terverifikasi')
            ->selectRaw('tanggal,jenis_setoran, sum(jumlah) as sum')->whereMonth('tanggal', date('m'))
            ->get();

        $sumbangan = SumbanganPiki::where('status', 'terverifikasi')->sum('jumlah');
        $pendapatan = Pendapatan::orderBy('tanggal', 'asc')->groupBy('jenis_pendapatan', 'tanggal')
            ->where('status', 'terverifikasi')
            ->selectRaw('tanggal,jenis_pendapatan, sum(jumlah) as sum')
            ->get();

            $Pengeluaran = Pengeluaran::orderBy('tanggal', 'asc')->groupBy('pos_anggaran', 'tanggal')
            ->where('status_pengeluaran', 'pengeluaran terverifikasi')
            ->selectRaw('tanggal,pos_anggaran, sum(jumlah) as sum')
            ->get();

        // return $Pengeluaran;
        // $sumbangan = SumbanganPiki::sum('jumlah');
        // dd($sumbangan);
        // dd($iuranPiki);
        // return $sumbangan->sum('jumlah');
        // return gettype(array_sum( explode( ',', $sumbangan->jumlah ) ));
        $arrJenisSetoran = [];
        foreach ($laporanKeuangan as $laporan) {
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

    public function cariPemasukan(Request $request)
    {
        // echo $request->namaKegiatan;
        $pemasukan = Pendapatan::whereMonth('tanggal', date('m'))->get();
        // return $cities;
        $option = "<thead><tr><th>No</th><th>Bulan</th><th colspan='2' class='text-center'>Pemasukan</th></tr><tr><th></th><th></th><th >Nama Pemasukan</th><th >Jumlah</th></tr></thead>";
        $no = 0;
        $aRupiah = [];
        if (count($pemasukan) > 0) {
            foreach ($pemasukan as $pendapatan) {
                $no++;
                $tanggalku = date('F', strtotime($pendapatan->tanggal));
                $option .= "<tr><td>$no</td><td>$tanggalku</td><td>$pendapatan->nama_penyetor</td><td>Rp. $pendapatan->jumlah</td></tr>";
                $aRupiah = array($pendapatan->jumlah);
            }
        } else {
            $option .= "<tr><td colspan='4' class='text-center'>tidak ada data</td></tr>";
        }

        // echo array_sum($a);
        $rupiah = 'Rp. ' . number_format(array_sum($aRupiah), 0, ",", ".");
        $option .= "<tfoot><tr><th></th><th></th><th>Total Pendapatan</th><td>$rupiah</span></th></tr></tfoot>";
        echo $option;
    }

    public function cariPemasukanLaporanKeuanganFilterTanggal(Request $request)
    {
        // echo $request->namaKegiatan;
        $pemasukan = Pendapatan::whereMonth('tanggal', date($request->month))->get();
        // return $cities;
        $option = "<thead><tr><th>No</th><th>Bulan</th><th colspan='2' class='text-center'>Pemasukan</th></tr><tr><th></th><th></th><th >Nama Pemasukan</th><th >Jumlah</th></tr></thead>";
        $no = 0;
        $aRupiah = [];
        if (count($pemasukan) > 0) {
            foreach ($pemasukan as $pendapatan) {
                $no++;
                $tanggalku = date('F', strtotime($pendapatan->tanggal));
                $option .= "<tr><td>$no</td><td>$tanggalku</td><td>$pendapatan->nama_penyetor</td><td>Rp. $pendapatan->jumlah</td></tr>";
                $aRupiah = array($pendapatan->jumlah);
            }
        } else {
            $option .= "<tr><td colspan='4' class='text-center'>tidak ada data</td></tr>";
        }

        // echo array_sum($a);
        $rupiah = 'Rp. ' . number_format(array_sum($aRupiah), 0, ",", ".");
        $option .= "<tfoot><tr><th></th><th></th><th>Total Pendapatan</th><td>$rupiah</span></th></tr></tfoot>";
        echo $option;
    }

    public function cariPengeluaran(Request $request)
    {
        // echo $request->namaKegiatan;
        $Pengeluaran = Pengeluaran::where('pos_anggaran', $request->namaKegiatan)
        ->get();
        // return $cities;
        $option = "<thead><tr><th>No</th><th>Bulan</th><th colspan='2' class='text-center'>Pengeluaran</th></tr><tr><th><th></th></th><th>Nama Pengeluaran</th><th >Jumlah</th></tr></thead>";
        $no = 0;
        $aRupiah = [];
        if (count($Pengeluaran) > 0) {
            foreach ($Pengeluaran as $pendapatanItem) {
                $no++;
                $tanggalku = date('F', strtotime($pendapatanItem->tanggal));
                $option .= "<tr><td>$no</td><td>$tanggalku</td><td>$pendapatanItem->uraian_pengeluaran</td><td>Rp. $pendapatanItem->jumlah</td></tr>";
                $aRupiah = array($pendapatanItem->jumlah);
            }
        } else {
            $option .= "<tr><td colspan='4' class='text-center'>tidak ada data</td></tr>";
        }

        // echo array_sum($a);
        $rupiah = 'Rp. ' . number_format(array_sum($aRupiah), 0, ",", ".");
        $option .= "<tfoot><tr><th></th><th></th><th>Total Pengeluaran</th><td>$rupiah</span></th></tr></tfoot>";
        echo $option;
    }

    public function cariPengeluaranLaporanKeuanganFilterTanggal(Request $request)
    {
        // echo 'cariPengeluaranLaporanKeuanganFilterTanggal'.$request->namaKegiatan;
        $Pengeluaran = Pengeluaran::whereMonth('tanggal', date($request->month))->where('pos_anggaran', $request->namaKegiatan)
        ->get();
        // return $cities;
        $option = "<thead><tr><th>No</th><th colspan='2' class='text-center'>Pengeluaran</th></tr><tr><th></th><th>Nama Pengeluaran</th><th >Jumlah</th></tr></thead>";
        $no = 0;
        $aRupiah = [];
        if (count($Pengeluaran) > 0) {
            foreach ($Pengeluaran as $pendapatanItem) {
                $no++;
                $option .= "<tr><td>$no</td><td>$pendapatanItem->uraian_pengeluaran</td><td>Rp. $pendapatanItem->jumlah</td></tr>";
                $aRupiah = array($pendapatanItem->jumlah);
            }
        } else {
            $option .= "<tr><td colspan='4' class='text-center'>tidak ada data</td></tr>";
        }

        // echo array_sum($a);
        $rupiah = 'Rp. ' . number_format(array_sum($aRupiah), 0, ",", ".");
        $option .= "<tfoot><tr><th></th><th>Total Pengeluaran</th><td>$rupiah</span></th></tr></tfoot>";
        echo $option;
    }
}
