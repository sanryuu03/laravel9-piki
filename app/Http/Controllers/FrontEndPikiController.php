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
use App\Models\BackendDokumen;
use App\Models\BackendFaq;
use App\Models\BackendFooter;
use App\Models\BackendTentang;
use App\Models\PartnerShip;
use App\Models\SponsorshipBeforeFaq;
use App\Models\SponsorShipDua;
use App\Models\SponsorshipNews;
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
        // if (str_contains(request()->header('User-Agent'), 'Android')) { // Is Android.
        //     return "heheh";
        // }
        // return request()->header('User-Agent');
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
        $sponsorshipBeforeFaq = SponsorshipBeforeFaq::first();
        $backendFooter = BackendFooter::latest()->first();
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
            "sponsorshipBeforeFaq" => $sponsorshipBeforeFaq,
            "backendFooter" => $backendFooter,
        ]);
    }

    public function mobile()
    {
        // if (str_contains(request()->header('User-Agent'), 'android')) { // Is Android.
        //     return "heheh";
        // }
        $headerMobile = HeaderPikiMobile::latest()->first();
        $berita = NewsPiki::latest()->take(3)->get()->load('categoryNews');
        $beritaLainnya = NewsPiki::latest()->skip(3)->take(10)->get();
        $categoryNews = CategoryNews::all();
        // return Carbon::parse(Carbon::now())->timestamp;
        $program = ProgramPiki::take(3)->get();
        $agenda = AgendaPiki::orderBy('id', 'desc')->take(4)->get();
        $item = AgendaPiki::latest()->first();
        $anggota = AnggotaPiki::where('tampilkan_anggota_dilandingpage', 'ya')->get();
        // return $anggota;
        $sponsor = SponsorPiki::take(7)->get();
        $backendFaq = BackendFaq::get();
        $partnerShip = PartnerShip::latest()->first();
        $sponsorShipSatu = SponsorShipSatu::latest()->first();
        $sponsorShipDua = SponsorShipDua::latest()->first();
        $sponsorShipTiga = SponsorShipTiga::latest()->first();
        $sponsorLainnya = SponsorPiki::take(5)->latest()->get();
        $sponsorshipBeforeFaq = SponsorshipBeforeFaq::first();
        return view('/2ndIndex', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            'headerMobile' => $headerMobile,
            "news" => $berita,
            "beritaLainnya" => $beritaLainnya,
            "categoryNews" => $categoryNews,
            "program" => $program,
            "agenda" => $agenda,
            "agendaItem" => $item,
            "anggota" => $anggota,
            "sponsor" => $sponsor,
            "backendFaq" => $backendFaq,
            "partnerShip" => $partnerShip,
            "sponsorShipSatu" => $sponsorShipSatu,
            "sponsorShipDua" => $sponsorShipDua,
            "sponsorShipTiga" => $sponsorShipTiga,
            "sponsorLainnya" => $sponsorLainnya,
            "sponsorshipBeforeFaq" => $sponsorshipBeforeFaq,
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
        $beritaSejenis = NewsPiki::latest()->take(6)->get();
        $sponsorshipNews1 = SponsorshipNews::where('posisi', 1)->latest()->first();
        $sponsorshipNews2 = SponsorshipNews::where('posisi', 2)->latest()->first();
        $sponsorshipNews3 = SponsorshipNews::where('posisi', 3)->latest()->first();
        $sponsorshipNews4 = SponsorshipNews::where('posisi', 4)->latest()->first();
        $sponsorshipNews5 = SponsorshipNews::where('posisi', 5)->latest()->first();
        $sponsorshipNews6 = SponsorshipNews::where('posisi', 6)->latest()->first();

        return view('/newsWebView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "news" => $newsPiki,
            "category" => $categoryNews[0]->name,
            "categoryNews" => $listberita,
            "beritaSejenis" => $beritaSejenis,
            "sponsorshipNews1" => $sponsorshipNews1,
            "sponsorshipNews2" => $sponsorshipNews2,
            "sponsorshipNews3" => $sponsorshipNews3,
            "sponsorshipNews4" => $sponsorshipNews4,
            "sponsorshipNews5" => $sponsorshipNews5,
            "sponsorshipNews6" => $sponsorshipNews6,
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
        $sponsorshipNews4 = SponsorshipNews::where('posisi', 4)->latest()->first();
        $sponsorshipNews5 = SponsorshipNews::where('posisi', 5)->latest()->first();
        $sponsorshipNews6 = SponsorshipNews::where('posisi', 6)->latest()->first();
        return view('/newsMobileView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "news" => $newsPiki,
            "category" => $categoryNews[0]->name,
            "categoryNews" => $listberita,
            "sponsorshipNews4" => $sponsorshipNews4,
            "sponsorshipNews5" => $sponsorshipNews5,
            "sponsorshipNews6" => $sponsorshipNews6,
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

    public function tentangWebView()
    {
        $backendTentang = BackendTentang::get();
        $backendDokumen = BackendDokumen::get();
        return view('/tentangWebView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "backendTentang" => $backendTentang,
            "backendDokumen" => $backendDokumen,
        ]);
    }

    public function tentangMobileView()
    {
        $newsPiki = NewsPiki::latest()->get();
        $backendTentang = BackendTentang::get();
        $backendDokumen = BackendDokumen::get();
        return view('/tentangMobileView', [
            "title" => "PIKI - SUMUT",
            "creator" => "San",
            "newsPiki" => $newsPiki,
            "backendTentang" => $backendTentang,
            "backendDokumen" => $backendDokumen,
        ]);
    }

    public function tentangMobileViewPost(Request $request)
    {
        if ($request->judulTentang) {
            $tentang = BackendTentang::where('judul', $request->judulTentang)->first();
            // return $tentang;
            echo json_encode($tentang);
        } else {
            $backendDokumen = BackendDokumen::get();
            // return $backendDokumen;
            $option = "";
            foreach($backendDokumen as $dokumen){
                $option .= "<div class='mt-1 card card-body keterangan_tentang'>
                <a href='$dokumen->link_web'>$dokumen->judul</a>
                </div>";
                // $option .= $dokumen->judul;
            }
            echo $option;
        }

    }

    public function search(Request $request)
    {
        $searchValues = $request->search;
        // return $request->search;
        if (str_contains($request->search, '"')) {
            // echo 'true';
            $withOutQuote = str_replace('"', "", $request->search);
            $searchBerita = NewsPiki::where('judul_berita', 'like', "%{$withOutQuote}%")
            ->orWhere('isi_berita', 'like', "%{$withOutQuote}%")->get();
        //   return $searchBerita;
            return view('/searchBeritaAndWebView', [
              "title" => "PIKI - SUMUT",
              "creator" => "San",
              "searchValues" => $request->search,
              "searchBerita" => $searchBerita,
          ]);
        }
        else {
            // echo 'false';
            $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);
            // $searchBerita = NewsPiki::where('judul_berita', $request)->get();
            $searchBerita = NewsPiki::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('judul_berita', 'like', "%{$value}%");
                }
            })->pluck('judul_berita', 'slug');
            return view('/searchBeritaWebView', [
              "title" => "PIKI - SUMUT",
              "creator" => "San",
              "searchValues" => $request->search,
              "searchBerita" => $searchBerita,
          ]);
        }
        //   return $searchBerita;

    }

    public function searchMobile(Request $request)
    {
        $searchValues = $request->search;
        // return $request->search;
        if (str_contains($request->search, '"')) {
            // echo 'true';
            $withOutQuote = str_replace('"', "", $request->search);
            $searchBerita = NewsPiki::where('judul_berita', 'like', "%{$withOutQuote}%")
            ->orWhere('isi_berita', 'like', "%{$withOutQuote}%")->get();
        //   return $searchBerita;
            return view('/searchBeritaAndMobileView', [
              "title" => "PIKI - SUMUT",
              "creator" => "San",
              "searchValues" => $request->search,
              "searchBerita" => $searchBerita,
          ]);
        }
        else {
            // echo 'false';
            $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);
            // $searchBerita = NewsPiki::where('judul_berita', $request)->get();
            $searchBerita = NewsPiki::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('judul_berita', 'like', "%{$value}%");
                }
            })->pluck('judul_berita', 'slug');
            return view('/searchBeritaMobileView', [
              "title" => "PIKI - SUMUT",
              "creator" => "San",
              "searchValues" => $request->search,
              "searchBerita" => $searchBerita,
          ]);
        }
        //   return $searchBerita;

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
