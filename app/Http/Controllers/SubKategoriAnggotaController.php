<?php

namespace App\Http\Controllers;

use App\Models\KategoriAnggota;
use App\Models\SubKategoriAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubKategoriAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $navbarAnggota = true;
        View::share([
            "navbarAnggota" => $navbarAnggota,
        ]);

    }

    public function index()
    {
        $subKategoriAnggota = SubKategoriAnggota::all();
        $user = auth()->user()->id;
        $kategoriAnggota = KategoriAnggota::get();
        return view('admin/subkategorianggota', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("sub kategori anggota"),
            "creator" => $user,
            "kategoriAnggota" => $kategoriAnggota,
            "subKategoriAnggota" => $subKategoriAnggota,
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
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(SubKategoriAnggota $subKategoriAnggota)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $kategoriAnggota = KategoriAnggota::get();
        return view('admin/formsubkategorianggota', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords("form tambah sub Kategori anggota"),
            "userId" => $userId,
            "namaUser" => $namaUser,
            "kategoriAnggota" => $kategoriAnggota,
            "subKategoriAnggota" => $subKategoriAnggota,
            "action" => 'add',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(SubKategoriAnggota $subKategoriAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubKategoriAnggota $subKategoriAnggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategoriAnggota  $subKategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        SubKategoriAnggota::where('id', $request->id)
        ->update($data);
        $subKategoriAnggota = SubKategoriAnggota::find($request->id);
        $subKategoriAnggota->delete(); //softdeletes

        return redirect()->back()->with('success', ' Sub Kategori Anggota telah dihapus');
    }

    public function saveFormSubKategoriAnggota(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'name' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'kategori_anggota_id' => 'required',
                'name' => 'required',
                'post_by' => 'required',
            ], $pesanError);

            SubKategoriAnggota::create($data);
            return redirect()->route('sub.kategori.anggota')->with('success', 'Sub Kategori Anggota telah ditambahkan');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            SubKategoriAnggota::where('id', $request->id)->update($data);
            return redirect()->route('sub.kategori.anggota')->with('success', 'Sub Kategori Anggota telah diedit');
        }
    }
}
