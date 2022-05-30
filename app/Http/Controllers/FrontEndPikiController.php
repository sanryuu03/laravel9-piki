<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NewsPiki;
use App\Models\AgendaPiki;
use App\Models\HeaderPiki;
use App\Models\AnggotaPiki;
use App\Models\ProgramPiki;
use App\Models\SponsorPiki;
use App\Models\FrontEndPiki;
use Illuminate\Http\Request;
use App\Models\HeaderPikiMobile;
use Illuminate\Support\Str;

class FrontEndPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = HeaderPiki::latest()->get();
        $headerMobile = HeaderPikiMobile::latest()->get();
        $berita = NewsPiki::latest()->first();
        $isiBerita = Str::limit($berita->isi_berita, 1100);
        $program = ProgramPiki::take(7)->get();
        $agenda = AgendaPiki::take(7)->get();
        $anggota = AnggotaPiki::take(7)->get();
        $user = User::take(7)->get();
        $sponsor = SponsorPiki::take(7)->get();
        return view('/index', [
            "title" => "PIKI - Sangrid",
            "creator" => "San",
            'header' => $header,
            "berita" => $berita,
            "isiBerita" => $isiBerita,
            'headerMobile' => $headerMobile,
            "program" => $program,
            "agenda" => $agenda,
            "anggota" => $anggota,
            "user" => $user,
            "sponsor" => $sponsor,
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
     * @param  \App\Models\FrontEndPiki  $frontEndPiki
     * @return \Illuminate\Http\Response
     */
    public function show(FrontEndPiki $frontEndPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontEndPiki  $frontEndPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontEndPiki $frontEndPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontEndPiki  $frontEndPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontEndPiki $frontEndPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontEndPiki  $frontEndPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontEndPiki $frontEndPiki)
    {
        //
    }
}
