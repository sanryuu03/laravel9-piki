<?php

namespace App\Http\Controllers;

use App\Models\BackendDokumen;
use App\Models\BackendTentang;
use Illuminate\Http\Request;
class BackendTentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backendTentang = BackendTentang::get();
        $backendDokumen = BackendDokumen::get();
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/backendTentang', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('backend tentang'),
            "creator" => $user,
            "backendTentang" => $backendTentang,
            "backendDokumen" => $backendDokumen,
            "action" => 'add',
            "namaUser" => $namaUser,
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
        if ($request->action == "add") {
            // return request();
            $data = $request->except('_token');

            BackendTentang::create($data);
            return redirect()->route('backendTentang.index')->with('success', 'Informasi Berhasil Dilakukan, Terima Kasih !');
        }
        if ($request->action == "edit") {
            // return $request->id;
            $data = $request->except('_token', 'action');

            BackendTentang::where('id', $request->id)->update($data);
            return redirect()->route('backendTentang.index')->with('success', 'Informasi telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BackendTentang  $backendTentang
     * @return \Illuminate\Http\Response
     */
    public function show(BackendTentang $backendTentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendTentang  $backendTentang
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendTentang $backendTentang)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        // return $backendTentang;
        return view('admin/formBackendTentang', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('backend tentang'),
            "creator" => $user,
            "backendTentang" => $backendTentang,
            "action" => 'edit',
            "namaUser" => $namaUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendTentang  $backendTentang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendTentang $backendTentang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendTentang  $backendTentang
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendTentang $backendTentang)
    {
        $data = ['deleted_by' => auth()->user()->name];
        // return $partnerShip;
        BackendTentang::where('id', $backendTentang->id)
        ->update($data);
        $backendTentang->id;
        $backendTentang->delete();
        return redirect()->back()->with('success', 'Informasi telah dihapus');
    }
}
