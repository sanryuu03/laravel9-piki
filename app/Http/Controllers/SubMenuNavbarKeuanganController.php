<?php

namespace App\Http\Controllers;

use App\Models\MasterMenuNavbar;
use App\Models\SubMenuNavbarKeuangan;
use Illuminate\Http\Request;

class SubMenuNavbarKeuanganController extends Controller
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
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::with('masterMenuNavbarKeuangan')->get();
        return view('admin/subMenuNavbarKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('sub menu navbar PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
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
     * @param  \App\Models\SubMenuNavbarKeuangan  $subMenuNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(SubMenuNavbarKeuangan $subMenuNavbarKeuangan)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        return view('admin/formSubMenuNavbarKeuangan', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('tambah sub menu navbar PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMenuNavbarKeuangan  $subMenuNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(SubMenuNavbarKeuangan $subMenuNavbarKeuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenuNavbarKeuangan  $subMenuNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMenuNavbarKeuangan $subMenuNavbarKeuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMenuNavbarKeuangan  $subMenuNavbarKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenuNavbarKeuangan $subMenuNavbarKeuangan)
    {
        //
    }

    public function saveFormSubMenuNavbarKeuangan(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'nama_sub_menu' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'master_menu_navbars_id' => 'required',
                'nama_sub_menu' => 'required',
                'post_by' => 'required',
            ], $pesanError);

            SubMenuNavbarKeuangan::create($data);
            return redirect()->route('backend.sub.menu.navbar.keuangan')->with('success', 'Sub Menu telah ditambahkan');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            SubMenuNavbarKeuangan::where('id', $request->id)->update($data);
            return redirect()->route('backend.sub.menu.navbar.keuangan')->with('success', 'Sub Menu telah diedit');
        }
    }
}
