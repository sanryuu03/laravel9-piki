<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryNews = CategoryNews::all();
        return view('categorynews', [
            "title" => "PIKI - Kategori Berita",
            "menu" => "Kategori Berita",
            "creator" => "San",
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryNews $categoryNews)
    {
        // return $categoryNews;
        return view('listcategorynews', [
            "title" => $categoryNews->name,
            "menu" => "Kategori Berita",
            "creator" => "San",
            'posts' => $categoryNews->newsPiki,
            'category' => $categoryNews->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryNews $categoryNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryNews $categoryNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryNews $categoryNews, $id)
    {
        $categoryNews = CategoryNews::find($id);
        $categoryNews->delete();
        return redirect()->back()->with('success', 'Kategori Berita berhasil di hapus');
    }

    public function kategoriberita()
    {
        $categoryNews = CategoryNews::all();
        $user = auth()->user()->id;
        return view('admin/kategoriberita', [
            "title" => "PIKI - SUMUT",
            "menu" => "Kategori Berita",
            "creator" => $user,
            "categoryNews" => $categoryNews,
        ]);
    }

    public function addkategoriberita(CategoryNews $categoryNews)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/addeditkategoriberita', [
            "title" => "PIKI - SUMUT",
            "menu" => "Form Tambah Kategori Berita",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "categoryNews" => $categoryNews,
            "action" => 'add',
        ]);
    }

    public function editkategoriberita($id)
    {
        $categoryNews = CategoryNews::find($id);
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/addeditkategoriberita', [
            "title" => "PIKI - SUMUT",
            "menu" => "Form Edit Kategori Berita",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "categoryNews" => $categoryNews,
            "action" => 'edit',
        ]);
    }

    public function saveformkategoriberita(Request $request, CategoryNews $categoryNews)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path_kategori_berita');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/categorynews/';


        // upload file
        $file->move($tujuan_upload, $nama_file);
        $data = request()->except(['_token']);
        $data['picture_path_kategori_berita'] = $nama_file;
        CategoryNews::create($data);
        return redirect()->route('backend.kategori.berita')->with('success', 'Kategori Berita telah ditambahkan');
        }

        if ($request->action == "edit") {
            // return $request->id;
            if ($request->file('picture_path_kategori_berita')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_kategori_berita');
                // dd($request->file('picture_path_kategori_berita'));
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/categorynews/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $result = CategoryNews::where('id', $request->id)->update([
                    'picture_path_kategori_berita' => $nama_file,
                    'edited_by' => $request->edited_by,
                ]);

                // return response()->json([$result]);
                return redirect()->route('backend.kategori.berita')->with('success', 'Gambar Kategori Berita telah diedit');
            }

            $data = $request->except(['_token', 'action']);
            CategoryNews::where('id', $request->id)->update($data);
            return redirect()->route('backend.kategori.berita')->with('success', 'Kategori Berita telah diedit');
        }

    }
}
