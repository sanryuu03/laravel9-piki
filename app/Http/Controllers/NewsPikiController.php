<?php

namespace App\Http\Controllers;

use App\Models\NewsPiki;
use Illuminate\Support\Str;
use App\Models\CategoryNews;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = NewsPiki::all();
        $categoryNews = CategoryNews::all();
        $user = auth()->user()->id;
        return view('admin/landingpageberita', [
            "title" => "PIKI - SUMUT",
            "menu" => "Berita",
            "creator" => $user,
            "berita" => $berita,
            "categoryNews" => $categoryNews,
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
        // return $request;
        $data = $request->validate([
            'judul_berita' => 'required',
            'slug' => 'required|unique:news_pikis',
            'category_news_id' => 'required',
            'picture_path' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan_foto' => 'required',
            'isi_berita' => 'required',

        ]);

        // ambil excerpt sekaligus hapus html menggunakan strip tags
        $data['excerpt'] = Str::limit(strip_tags($request->isi_berita), 200);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/news/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        NewsPiki::create($data);

        return redirect()->back()->with('success', 'Berita baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPiki  $newsPiki
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPiki $newsPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPiki  $newsPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPiki $newsPiki, $id)
    {
        // $newsPiki = NewsPiki::where('id',$id)->get();
        // return $id;
        $newsPiki = NewsPiki::find($id);
        // return $newsPiki;
        // return $newsPiki->id;
        $categoryNews = CategoryNews::all();
        return view('admin/editberita', [
            "title" => "PIKI - SUMUT",
            "menu" => "Berita",
            "creator" => "San",
            "newsPiki" => $newsPiki,
            "categoryNews" => $categoryNews,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPiki  $newsPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPiki $newsPiki)
    {
        // return $request->slug;
        $rules = [
            'judul_berita' => 'required',
            'category_news_id' => 'required',
            'keterangan_foto' => 'required',
            'isi_berita' => 'required',

        ];

        if($request->slug != $request->slug)
        {
            $rules['slug'] = 'required|unique:news_pikis';
        }

        // return $request->id;
        $data = $request->validate($rules);
        $data['excerpt'] = Str::limit(strip_tags($request->isi_berita), 1690);
        if ($request->file('picture_path')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            // dd($request->file('picture_path'));
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/news/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            NewsPiki::where('id', $request->id)->update([
                'picture_path' => $nama_file,
            ]);
        }
// return $data;
        NewsPiki::where('id', $request->id)
                ->update($data);


        // return response()->json($newsPiki);
        return redirect()->route('berita')->with('success', 'Berita berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPiki  $newsPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPiki $newsPiki, $id)
    {
        $newsPiki = NewsPiki::find($id);
        $newsPiki->delete();
        return redirect()->back()->with('success', 'Berita berhasil di hapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(NewsPiki::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
