<?php

namespace App\Http\Controllers;

use App\Models\BackendDokumen;
use Illuminate\Http\Request;

class BackendDokumenController extends Controller
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
        if ($request->action == "add") {
            // return request();
            $data = $request->except('_token');

            BackendDokumen::create($data);
            return redirect()->route('backendTentang.index')->with('success', 'Dokumen Berhasil Dilakukan, Terima Kasih !');
        }
        if ($request->action == "edit") {
            // return $request->id;
            $data = $request->except('_token', 'action');

            BackendDokumen::where('id', $request->id)->update($data);
            return redirect()->route('backendTentang.index')->with('success', 'Dokumen telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BackendDokumen  $backendDokumen
     * @return \Illuminate\Http\Response
     */
    public function show(BackendDokumen $backendDokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendDokumen  $backendDokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendDokumen $backendDokumen, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        // dd($id);
        return view('admin/formBackendDokumen', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('backend dokumen'),
            "creator" => $user,
            "backendDokumen" => $backendDokumen->find($id),
            "action" => 'edit',
            "namaUser" => $namaUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendDokumen  $backendDokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendDokumen $backendDokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendDokumen  $backendDokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendDokumen $backendDokumen, $id)
    {
        // return $backendDokumen;//
        $data = ['deleted_by' => auth()->user()->name];
        // return $partnerShip;
        $backendDokumen->where('id', $id)
        ->update($data);
        $backendDokumen->find($id)->delete();
        return redirect()->back()->with('success', 'Informasi telah dihapus');
    }
}
