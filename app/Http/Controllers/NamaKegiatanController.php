<?php

namespace App\Http\Controllers;

use App\Models\NamaKegiatan;
use App\Models\PosAnggaran;
use Illuminate\Http\Request;

class NamaKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $namaKegiatan = NamaKegiatan::all();
        $posAnggaran = PosAnggaran::get();
        return view('admin/namaKegiatan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('nama kegiatan PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'namaKegiatan' => $namaKegiatan,
            'namaUser' => $namaUser,
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
     * @param  \App\Models\NamaKegiatan  $namaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(NamaKegiatan $namaKegiatan)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $posAnggaran = PosAnggaran::get();
        return view('admin/formNamaKegiatan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('form tambah nama kegiatan PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'namaKegiatan' => $namaKegiatan,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NamaKegiatan  $namaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(NamaKegiatan $namaKegiatan, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $namaKegiatan = NamaKegiatan::find($id);
        $posAnggaran = PosAnggaran::get();
        return view('admin/formNamaKegiatan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('form edit nama kegiatan PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'namaKegiatan' => $namaKegiatan,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NamaKegiatan  $namaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NamaKegiatan $namaKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NamaKegiatan  $namaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(NamaKegiatan $namaKegiatan)
    {
        //
    }

    public function saveFormNamaKegiatan(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'nama_kegiatan' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'pos_anggarans_id' => 'required',
                'nama_kegiatan' => 'required',
                'post_by' => 'required',
            ], $pesanError);

            NamaKegiatan::create($data);
            return redirect()->route('backend.nama.kegiatan')->with('success', 'Nama Kegiatan telah ditambahkan');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            NamaKegiatan::where('id', $request->id)->update($data);
            return redirect()->route('backend.nama.kegiatan')->with('success', 'Nama Kegiatan telah diedit');
        }
    }
}
