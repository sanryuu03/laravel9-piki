<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\NewsPiki;
use App\Models\AgendaPiki;
use App\Models\HeaderPiki;
use App\Models\AnggotaPiki;
use App\Models\ProgramPiki;
use App\Models\SponsorPiki;
use Illuminate\Support\Str;
use App\Models\CategoryNews;
use App\Models\FrontEndPiki;
use Illuminate\Http\Request;
use App\Models\HeaderPikiMobile;
use App\Http\Controllers\Controller;
use App\Models\BackendFaq;

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
        $berita = NewsPiki::latest()->take(3)->get();
        $categoryNews = CategoryNews::all();
        // return Carbon::parse(Carbon::now())->timestamp;
        $program = ProgramPiki::take(3)->get();
        $agenda = AgendaPiki::orderBy('id', 'desc')->take(4)->get();
        $item = AgendaPiki::latest()->first();
        $anggota = AnggotaPiki::where('tampilkan_anggota_dilandingpage', 'ya')->get();
        // return $anggota;
        $user = User::all();
        $sponsor = SponsorPiki::take(7)->get();
        $backendFaq = BackendFaq::get();
        return view('/index', [
            "title" => "PIKI - Sangrid",
            "creator" => "San",
            'header' => $header,
            'headerMobile' => $headerMobile,
            "news" => $berita,
            "categoryNews" => $categoryNews,
            "program" => $program,
            "agenda" => $agenda,
            "itemAgenda" => $item,
            "anggota" => $anggota,
            "user" => $user,
            "sponsor" => $sponsor,
            "backendFaq" => $backendFaq,
        ]);
    }

    public function mobile()
    {
        $header = HeaderPiki::latest()->get();
        $headerMobile = HeaderPikiMobile::latest()->first();
        $berita = NewsPiki::latest()->take(3)->get();
        $categoryNews = CategoryNews::all();
        // return Carbon::parse(Carbon::now())->timestamp;
        $program = ProgramPiki::take(3)->get();
        $agenda = AgendaPiki::orderBy('id', 'desc')->take(4)->get();
        $item = AgendaPiki::latest()->first();
        $anggota = AnggotaPiki::where('tampilkan_anggota_dilandingpage', 'ya')->get();
        // return $anggota;
        $user = User::all();
        $sponsor = SponsorPiki::take(7)->get();
        $backendFaq = BackendFaq::get();
        return view('/2ndIndex', [
            "title" => "PIKI - Sangrid",
            "creator" => "San",
            'header' => $header,
            'headerMobile' => $headerMobile,
            "news" => $berita,
            "categoryNews" => $categoryNews,
            "program" => $program,
            "agenda" => $agenda,
            "itemAgenda" => $item,
            "anggota" => $anggota,
            "user" => $user,
            "sponsor" => $sponsor,
            "backendFaq" => $backendFaq,
        ]);
    }

    public function news(NewsPiki $newsPiki)
    {
        // return $newsPiki;
        // return $newsPiki->categoryNews;
        // return $newsPiki->judul_berita;
        // return $newsPiki->categoryNews->name;
        return view('/news', [
            "title" => "PIKI - Sangrid",
            "creator" => "San",
            "news" => $newsPiki,
        ]);
    }

    public function program($slug)
    {
        $programPiki = ProgramPiki::where('slug', $slug)->first();
        return view('/program', [
            "title" => "PIKI - Sangrid",
            "creator" => "San",
            "program" => $programPiki,
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
