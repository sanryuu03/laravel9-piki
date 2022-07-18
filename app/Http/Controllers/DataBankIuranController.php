<?php

namespace App\Http\Controllers;

use App\Models\DataBankIuran;
use Illuminate\Http\Request;

class DataBankIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $dataIuran = DataBankIuran::all();
        return view('admin/dataIuran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('Pengaturan Rekening Bank PIKI SUMUT'),
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
     * @param  \App\Models\DataBankIuran  $dataBankIuran
     * @return \Illuminate\Http\Response
     */
    public function show(DataBankIuran $dataBankIuran)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formDataRekeningIuran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Edit Data Rekening Iuran PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'dataIuran' => $dataBankIuran,
            'namaUser' => $namaUser,
            'action' => 'add',
            'urlNavbarKeuangan' => 'urlNavbarKeuangan',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBankIuran  $dataBankIuran
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBankIuran $dataBankIuran, $id)
    {
        $user = auth()->user()->id;
        $dataIuran = DataBankIuran::find($id);
        $namaUser = auth()->user()->name;
        return view('admin/formDataRekeningIuran', [
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
     * @param  \App\Models\DataBankIuran  $dataBankIuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBankIuran $dataBankIuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBankIuran  $dataBankIuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        DataBankIuran::where('id', $request->id)
        ->update($data);
        $iuran = DataBankIuran::find($request->id);
        $iuran->delete(); //softdeletes

        return redirect()->route('backend.data.iuran')->with('success', 'Data Bank Iuran telah dihapus');
    }

    public function saveFormDataIuran(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
        $data = request()->except(['_token']);
        DataBankIuran::create($data);
        return redirect()->route('backend.data.iuran')->with('success', 'Data Bank Iuran telah ditambahkan');
        }

        if ($request->action == "edit") {
            $data = $request->except(['_token', 'action']);
            DataBankIuran::where('id', $request->id)->update($data);
            return redirect()->route('backend.data.iuran')->with('success', 'Data Bank Iuran telah diedit');
        }

    }
}
