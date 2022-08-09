<?php

namespace App\Http\Controllers;

use App\Models\MasterMenuNavbar;
use App\Models\SubMenuNavbarKeuangan;
use Illuminate\Http\Request;
use LaravelLang\Lang\Plugins\Jetstream\Master;

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
            "title" => "PIKI - SUMUT CRUD",
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
            "title" => "PIKI - SUMUT CRUD",
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
    public function edit(SubMenuNavbarKeuangan $subMenuNavbarKeuangan, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::find($id);
        return view('admin/formSubMenuNavbarKeuangan', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('form edit sub menu navbar PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'masterMenu$masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
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
        // return $request->nama_sub_menu;
        if ($request->action == "add") {
            $pesanError = [
                'nama_sub_menu' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $rules = [
                'master_menu_navbars_id' => 'required',
                'nama_sub_menu' => 'required',
                'post_by' => 'required',
            ];
            $data = $request->validate($rules, $pesanError);
            if ($request->master_menu_navbars_id == 1) {
                $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::where('master_menu_navbars_id', $request->master_menu_navbars_id)->where('nama_sub_menu', $request->nama_sub_menu)->first();
                if ($subMenuNavbarKeuangan == null) {
                    SubMenuNavbarKeuangan::create($data);
                    return redirect()->route('backend.sub.menu.navbar.keuangan')->with('success', 'Sub Menu telah ditambahkan');
                }
                if ($request->nama_sub_menu == $subMenuNavbarKeuangan->nama_sub_menu) {
                    $rules['nama_sub_menu'] = 'required|unique:nama_sub_menu';
                    return redirect()->route('backend.sub.menu.navbar.keuangan')->with('unapproved', 'Sub Menu sudah ada');
                }
            }
            if ($request->master_menu_navbars_id == 2) {
                $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::where('master_menu_navbars_id', $request->master_menu_navbars_id)->where('nama_sub_menu', $request->nama_sub_menu)->first();
                if ($subMenuNavbarKeuangan == null) {
                    SubMenuNavbarKeuangan::create($data);
                    return redirect()->route('backend.sub.menu.navbar.keuangan')->with('success', 'Sub Menu telah ditambahkan');
                }
                if ($request->nama_sub_menu == $subMenuNavbarKeuangan->nama_sub_menu) {
                    $rules['nama_sub_menu'] = 'required|unique:nama_sub_menu';
                    return redirect()->route('backend.sub.menu.navbar.keuangan')->with('unapproved', 'Sub Menu sudah ada');
                }
            }
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            SubMenuNavbarKeuangan::where('id', $request->id)->update($data);
            return redirect()->route('backend.sub.menu.navbar.keuangan')->with('success', 'Sub Menu telah diedit');
        }
    }

    public function destroySubMenuNavbarKeuangan(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        SubMenuNavbarKeuangan::where('id', $request->id)
            ->update($data);
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::find($request->id);
        $subMenuNavbarKeuangan->delete(); //softdeletes

        return redirect()->back()->with('success', 'Sub Menu Navbar telah dihapus');
    }
}
