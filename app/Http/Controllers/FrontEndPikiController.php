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
use App\Models\PartnerShip;
use App\Models\SponsorShipDua;
use App\Models\SponsorShipSatu;
use App\Models\SponsorShipTiga;

class FrontEndPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = HeaderPiki::latest()->first();
        $headerMobile = HeaderPikiMobile::latest()->get();
        $berita = NewsPiki::latest()->take(3)->get();
        $beritaLainnya = NewsPiki::latest()->skip(3)->take(6)->get();
        $categoryNews = CategoryNews::all();
        $beritaSejenis = NewsPiki::latest()->get();
        // return Carbon::parse(Carbon::now())->timestamp;
        $program = ProgramPiki::take(3)->get();
        $agenda = AgendaPiki::orderBy('id', 'desc')->take(4)->get();
        $item = AgendaPiki::latest()->first();
        $anggota = AnggotaPiki::where('tampilkan_anggota_dilandingpage', 'ya')->get();
        // return $anggota;
        $user = User::all();
        $sponsor = SponsorPiki::latest()->take(3)->get();
        $sponsorLainnya = SponsorPiki::take(5)->latest()->get();
        $backendFaq = BackendFaq::get();
        $partnerShip = PartnerShip::latest()->first();
        $sponsorShipSatu = SponsorShipSatu::latest()->first();
        $sponsorShipDua = SponsorShipDua::latest()->first();
        $sponsorShipTiga = SponsorShipTiga::latest()->first();
        return view('/index', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            'header' => $header,
            'headerMobile' => $headerMobile,
            "news" => $berita,
            "beritaLainnya" => $beritaLainnya,
            "categoryNews" => $categoryNews,
            "beritaSejenis" => $beritaSejenis,
            "program" => $program,
            "agenda" => $agenda,
            "itemAgenda" => $item,
            "anggota" => $anggota,
            "user" => $user,
            "sponsor" => $sponsor,
            "sponsorLainnya" => $sponsorLainnya,
            "backendFaq" => $backendFaq,
            "partnerShip" => $partnerShip,
            "sponsorShipSatu" => $sponsorShipSatu,
            "sponsorShipDua" => $sponsorShipDua,
            "sponsorShipTiga" => $sponsorShipTiga,
        ]);
    }

    public function mobile()
    {
        $header = HeaderPiki::latest()->get();
        $headerMobile = HeaderPikiMobile::latest()->first();
        $berita = NewsPiki::latest()->take(3)->get();
        $beritaLainnya = NewsPiki::latest()->skip(3)->take(10)->get();
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
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            'header' => $header,
            'headerMobile' => $headerMobile,
            "news" => $berita,
            "beritaLainnya" => $beritaLainnya,
            "categoryNews" => $categoryNews,
            "program" => $program,
            "agenda" => $agenda,
            "agendaItem" => $item,
            "anggota" => $anggota,
            "user" => $user,
            "sponsor" => $sponsor,
            "backendFaq" => $backendFaq,
        ]);
    }

    public function newsWebView(NewsPiki $newsPiki)
    {
        // return $newsPiki;
        // return $newsPiki->categoryNews;
        // return $newsPiki->judul_berita;
        // return $newsPiki->categoryNews->name;
        $categoryNewsId = CategoryNews::where('name', $newsPiki->categoryNews->name)->get();
        $listberita = $newsPiki->where('category_news_id',$newsPiki->category_news_id)->get();
        // return
        $categoryNews = CategoryNews::where('id', $categoryNewsId[0]->id)->get();

        return view('/newsWebView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "news" => $newsPiki,
            "category" => $categoryNews[0]->name,
            "categoryNews" => $listberita,
        ]);
    }

    public function newsMobileView(NewsPiki $newsPiki)
    {
        // return $newsPiki;
        // return $newsPiki->categoryNews;
        // return $newsPiki->judul_berita;
        // return $newsPiki->categoryNews->name;
        $categoryNewsId = CategoryNews::where('name', $newsPiki->categoryNews->name)->get();
        $listberita = $newsPiki->where('category_news_id',$newsPiki->category_news_id)->get();
        // return
        $categoryNews = CategoryNews::where('id', $categoryNewsId[0]->id)->get();

        return view('/newsMobileView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "news" => $newsPiki,
            "category" => $categoryNews[0]->name,
            "categoryNews" => $listberita,
        ]);
    }

    public function program($slug)
    {
        $programPiki = ProgramPiki::where('slug', $slug)->first();
        return view('/program', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "program" => $programPiki,
        ]);
    }

    public function communityPartners($id)
    {
        $communityPartners = SponsorPiki::where('id', $id)->first();
        return view('/communityPartners', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "communityPartners" => $communityPartners,
        ]);
    }

    public function beritaLainnyaWebView()
    {
        $newsPiki = NewsPiki::latest()->get();
        return view('/beritaLainnyaWebView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "newsPiki" => $newsPiki,
        ]);
    }

    public function beritaLainnyaMobileView()
    {
        $newsPiki = NewsPiki::latest()->get();
        return view('/beritaLainnyaMobileView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "newsPiki" => $newsPiki,
        ]);
    }

    public function artikelWebView($judul)
    {
        $sponsorPiki = SponsorPiki::where('judul', $judul)->first();
        return view('/artikelWebView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "SponsorPiki" => $sponsorPiki,
        ]);
    }


    public function artikelLainnya()
    {
        $sponsorPiki = SponsorPiki::latest()->get();
        return view('/artikelWebViewLainnya', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "sponsorPiki" => $sponsorPiki,
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
