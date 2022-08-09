<?php

namespace App\Http\Controllers;

use App\Models\KategoriAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class KategoriAnggotaController extends Controller
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
        $kategoriAnggota = KategoriAnggota::all();
        $user = auth()->user()->id;
        return view('admin/kategorianggota', [
            "title" => "PIKI - SUMUT",
            "menu" => "Kategori Anggota",
            "creator" => $user,
            "kategoriAnggota" => $kategoriAnggota,
        ]);
    }

    public function addKategoriAnggota(KategoriAnggota $kategoriAnggota)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formkategorianggota', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords("Form Tambah Kategori anggota"),
            "userId" => $userId,
            "namaUser" => $namaUser,
            "kategoriAnggota" => $kategoriAnggota,
            "action" => 'add',
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
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriAnggota $kategoriAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriAnggota $kategoriAnggota, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $kategoriAnggota = KategoriAnggota::find($id);
        return view('admin/formkategorianggota', [
            "title" => "PIKI - SUMUT CRUD",
            'menu' => ucwords('form edit kategori anggota PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'kategoriAnggota' => $kategoriAnggota,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriAnggota $kategoriAnggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriAnggota  $kategoriAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        KategoriAnggota::where('id', $request->id)
        ->update($data);
        $kategoriAnggota = KategoriAnggota::find($request->id);
        $kategoriAnggota->delete(); //softdeletes

        return redirect()->back()->with('success', 'Kategori Anggota telah dihapus');
    }

    public function saveFormKategoriAnggota(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'name' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'name' => 'required',
                'post_by' => 'required',
            ], $pesanError);
            KategoriAnggota::create($data);
            return redirect()->route('kategori.anggota')->with('success', 'Kategori Anggota telah ditambahkan');
        }
        if ($request->action == "edit") {
            $data = $request->except(['_token', 'action']);
            KategoriAnggota::where('id', $request->id)->update($data);
            return redirect()->route('kategori.anggota')->with('success', 'Kategori Anggota telah diedit');
        }
    }
}
