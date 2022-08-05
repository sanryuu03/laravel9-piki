<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\SumbanganPiki;
use App\Models\DinamisUrlNavbarKeuangan;
use App\Models\SubMenuNavbarKeuangan;

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

    public function dinamisUrlNavbarKeuangan(Request $request, $masterMenu, $subMenu)
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
            'menu' => ucwords('Pemasukan' . $subMenu . 'PIKI SUMUT'),
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
        // return $subMenu;
        $subMenuId = SubMenuNavbarKeuangan::where('nama_sub_menu', $subMenu)->first();
        if ($masterMenu == 'pemasukan') {
            // return $masterMenu;
            $pendapatan = Pendapatan::where('jenis_pendapatan', $subMenu)->where('status', 'baru')->get();
            $sumbangan = SumbanganPiki::where('status', 'baru')->get();
            if ($subMenu == 'iuran') {
                return view('admin/pemasukanIuranBaru', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' Baru'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $pendapatan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
            if ($subMenu == 'sumbangan') {
                return view('admin/pemasukanSumbanganBaru', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' Baru'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $sumbangan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
            if ($subMenu == 'donasi') {
                return view('admin/pemasukanSumbanganBaru', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' Baru'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $sumbangan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
            else {
                return view('admin/pemasukanDinamisBaru', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' Baru'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $pendapatan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
        } else {
            $Pengeluaran = Pengeluaran::where('pos_anggaran', $subMenuId->id)->where('status_pengeluaran', 'pengeluaran baru')->get();
            return view('admin/pengeluaranDinamisBaru', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('Pengeluaran ' . $subMenu . ' Baru'),
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
        if ($masterMenu == 'pemasukan') {
            // return $subMenu;
            $pendapatan = Pendapatan::where('jenis_pendapatan', $subMenu)->where('status', 'diproses')->get();
            $sumbangan = SumbanganPiki::where('status', 'baru')->get();
            if ($subMenu == 'Iuran') {
                return view('admin/pemasukanDinamisDiproses', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' diproses'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $pendapatan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
            if ($subMenu == 'sumbangan') {
                return view('admin/pemasukanSumbanganDiproses', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' diproses'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $sumbangan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
            if ($subMenu == 'donasi') {
                return view('admin/pemasukanSumbanganDiproses', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' diproses'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $sumbangan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
            else {
                return view('admin/pemasukanDinamisBaru', [
                    "title" => "PIKI - Sangrid CRUD",
                    'menu' => ucwords('pendapatan ' . $subMenu . ' diproses'),
                    "creator" => $user,
                    'summary' => 'ringkasan',
                    'pendapatan' => $pendapatan,
                    'masterMenu' => $masterMenu,
                    'subMenu' => $subMenu,
                ]);
            }
        }
        else {
            $Pengeluaran = Pengeluaran::where('pos_anggaran', $subMenu)->where('status_pengeluaran', 'pengeluaran diproses')->get();
            return view('admin/pengeluaranDinamisDiproses', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('Pengeluaran ' . $subMenu . ' diproses'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'Pengeluaran' => $Pengeluaran,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
            ]);
        }
    }

    public function dinamisIsiMenuKeuanganDitolak($masterMenu, $subMenu)
    {
        $user = auth()->user()->id;
        if ($masterMenu == 'pemasukan') {
            // return $masterMenu;
            $pendapatan = Pendapatan::where('jenis_pendapatan', $subMenu)->where('status', 'ditolak')->get();
            return view('admin/pemasukanDinamisDitolak', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('pendapatan ' . $subMenu . ' ditolak'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'pendapatan' => $pendapatan,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
            ]);
        } else {
            $Pengeluaran = Pengeluaran::where('pos_anggaran', $subMenu)->where('status_pengeluaran', 'pengeluaran ditolak')->get();
            return view('admin/pengeluaranDinamisDitolak', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('Pengeluaran ' . $subMenu . ' ditolak'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'Pengeluaran' => $Pengeluaran,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
            ]);
        }
    }

    public function dinamisIsiMenuKeuanganDiterima($masterMenu, $subMenu)
    {
        $user = auth()->user()->id;
        if ($masterMenu == 'pemasukan') {
            // return $masterMenu;
            $pendapatan = Pendapatan::where('jenis_pendapatan', $subMenu)->where('status', 'terverifikasi')->get();
            return view('admin/pemasukanDinamisDiterima', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('pendapatan ' . $subMenu . ' diterima'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'pendapatan' => $pendapatan,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
            ]);
        } else {
            $Pengeluaran = Pengeluaran::where('pos_anggaran', $subMenu)->where('status_pengeluaran', 'pengeluaran terverifikasi')->get();
            return view('admin/pengeluaranDinamisDiterima', [
                "title" => "PIKI - Sangrid CRUD",
                'menu' => ucwords('Pengeluaran ' . $subMenu . ' diterima'),
                "creator" => $user,
                'summary' => 'ringkasan',
                'Pengeluaran' => $Pengeluaran,
                'masterMenu' => $masterMenu,
                'subMenu' => $subMenu,
            ]);
        }
    }
}
