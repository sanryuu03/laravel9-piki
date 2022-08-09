<?php

namespace App\Http\Controllers;

use App\Models\MasterMenuNavbar;
use Illuminate\Http\Request;

class MasterMenuNavbarController extends Controller
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
     * @param  \App\Models\MasterMenuNavbar  $masterMenuNavbar
     * @return \Illuminate\Http\Response
     */
    public function show(MasterMenuNavbar $masterMenuNavbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterMenuNavbar  $masterMenuNavbar
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterMenuNavbar $masterMenuNavbar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterMenuNavbar  $masterMenuNavbar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterMenuNavbar $masterMenuNavbar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterMenuNavbar  $masterMenuNavbar
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterMenuNavbar $masterMenuNavbar)
    {
        //
    }

    public function masterMenuNavbarKeuangan()
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        return view('admin/masterMenuNavbarKeuangan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('master menu navbar PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    public function formAddMasterMenuNavbarKeuangan(MasterMenuNavbar $masterMenuNavbar)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formMasterMenuNavbarKeuangan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('form tambah menu navbar PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbar,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    public function formEditMasterMenuNavbarKeuangan(MasterMenuNavbar $masterMenuNavbar, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::find($id);
        return view('admin/formMasterMenuNavbarKeuangan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('form edit menu navbar PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function saveFormMasterMenuNavbarKeuangan(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'nama_menu' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'nama_menu' => 'required',
                'post_by' => 'required',
            ], $pesanError);

            MasterMenuNavbar::create($data);
            return redirect()->route('backend.master.menu.navbar.keuangan')->with('success', 'Menu Navbar telah ditambahkan');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            MasterMenuNavbar::where('id', $request->id)->update($data);
            return redirect()->route('backend.master.menu.navbar.keuangan')->with('success', 'Menu Navbar telah diedit');
        }
    }

    public function destroyMasterMenuNavbarKeuangan(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        MasterMenuNavbar::where('id', $request->id)
        ->update($data);
        $masterMenuNavbarKeuangan = MasterMenuNavbar::find($request->id);
        $masterMenuNavbarKeuangan->delete(); //softdeletes

        return redirect()->back()->with('success', 'Menu Navbar telah dihapus');
    }
}
