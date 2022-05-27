<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AnggotaPiki;
use Illuminate\Http\Request;

class AnggotaPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = AnggotaPiki::take(7)->get();
        $user = User::get();
        return view('admin/landingpageanggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Anggota",
            "creator" => "San",
            "anggota" => $anggota,
            "user" => $user,
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
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::get();
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => "CV Anggota",
            "creator" => "San",
            "anggotaPiki" => $anggotaPiki,
            "user" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaPiki $anggotaPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaPiki $anggotaPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaPiki $anggotaPiki)
    {
        //
    }
}
