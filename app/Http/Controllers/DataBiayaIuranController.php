<?php

namespace App\Http\Controllers;

use App\Models\DataBiayaIuran;
use Illuminate\Http\Request;

class DataBiayaIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $dataIuran = DataBiayaIuran::all();
        return view('admin/dataBiayaIuran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Data Biaya Iuran PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'dataIuran' => $dataIuran,
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
     * @param  \App\Models\DataBiayaIuran  $dataBiayaIuran
     * @return \Illuminate\Http\Response
     */
    public function show(DataBiayaIuran $dataBiayaIuran)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formDataBiayaIuran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Edit Data Rekening Iuran PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'dataIuran' => $dataBiayaIuran,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBiayaIuran  $dataBiayaIuran
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBiayaIuran $dataBiayaIuran, $id)
    {
        $user = auth()->user()->id;
        $dataIuran = DataBiayaIuran::find($id);
        $namaUser = auth()->user()->name;
        return view('admin/formDataBiayaIuran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Edit Data Rekening Iuran PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'dataIuran' => $dataIuran,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBiayaIuran  $dataBiayaIuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBiayaIuran $dataBiayaIuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBiayaIuran  $dataBiayaIuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        DataBiayaIuran::where('id', $request->id)
        ->update($data);
        $dataBiayaIuran = DataBiayaIuran::find($request->id);
        $dataBiayaIuran->delete(); //softdeletes

        return redirect()->route('backend.data.biaya.iuran')->with('success', 'Data Bank Iuran telah dihapus');
    }

    public function saveFormDataBiayaIuran(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
        $data = request()->except(['_token']);
        DataBiayaIuran::create($data);
        return redirect()->route('backend.data.biaya.iuran')->with('success', 'Data Biaya Iuran telah ditambahkan');
        }

        if ($request->action == "edit") {
            $data = $request->except(['_token', 'action']);
            DataBiayaIuran::where('id', $request->id)->update($data);
            return redirect()->route('backend.data.biaya.iuran')->with('success', 'Data Biaya Iuran telah diedit');
        }

    }
}
