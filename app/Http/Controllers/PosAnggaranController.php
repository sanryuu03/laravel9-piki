<?php

namespace App\Http\Controllers;

use App\Models\NamaKegiatan;
use App\Models\PosAnggaran;
use Illuminate\Http\Request;

class PosAnggaranController extends Controller
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
        $posAnggaran = PosAnggaran::get();
        return view('admin/posAnggaran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('pos anggaran PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'namaUser' => $namaUser,
            'action' => 'add',
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
     * @param  \App\Models\PosAnggaran  $posAnggaran
     * @return \Illuminate\Http\Response
     */
    public function show(PosAnggaran $posAnggaran)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formPosAnggaran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form tambah pos anggaran PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PosAnggaran  $posAnggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(PosAnggaran $posAnggaran, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $posAnggaran = PosAnggaran::find($id);
        return view('admin/formPosAnggaran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form edit pos anggaran PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PosAnggaran  $posAnggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PosAnggaran $posAnggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PosAnggaran  $posAnggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        PosAnggaran::where('id', $request->id)
        ->update($data);
        $posAnggaran = PosAnggaran::find($request->id);
        $posAnggaran->delete(); //softdeletes

        return redirect()->back()->with('success', 'Pos Anggaran telah dihapus');
    }

    public function saveFormPosAngaran(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'nama_pos_anggaran' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'nama_pos_anggaran' => 'required',
                'post_by' => 'required',
            ], $pesanError);

            PosAnggaran::create($data);
            return redirect()->route('backend.pos.anggaran')->with('success', 'Pos Anggaran telah ditambahkan');
        }
        if ($request->action == "edit") {
            // return $request->id;
            $data = $request->except(['_token', 'action']);
            PosAnggaran::where('id', $request->id)->update($data);
            return redirect()->route('backend.pos.anggaran')->with('success', 'Pos Anggaran telah diedit');
        }
    }

    public function posAnggaran(Request $request)
    {
        $pos_anggarans_id = $request->pos_anggarans_id;
        // return request()->input('provinsi');
        $posAnggaran = NamaKegiatan::where('pos_anggarans_id', $pos_anggarans_id)->get();
        // return $posAnggaran;
        $option = "<option>==Pilih Kegiatan==</option>";
        foreach($posAnggaran as $namaKegiatan){
            $option .= "<option value='$namaKegiatan->id'>$namaKegiatan->nama_kegiatan</option>";
        }
        echo $option;
    }
}
