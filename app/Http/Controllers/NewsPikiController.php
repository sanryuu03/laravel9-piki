<?php

namespace App\Http\Controllers;

use App\Models\NewsPiki;
use Illuminate\Http\Request;

class NewsPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = NewsPiki::take(7)->get();
        return view('admin/landingpageberita', [
            "title" => "PIKI - Sangrid",
            "menu" => "Berita",
            "creator" => "San",
            "berita" => $berita,
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
        $data = $request->validate([
            'picture_path' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan_foto' => 'required',
            'isi_berita' => 'required',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/news/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        NewsPiki::create([
            "keterangan_foto" => $data['keterangan_foto'],
            "isi_berita" => $data['isi_berita'],
            'picture_path' => $nama_file,
        ]);

        return redirect()->back();
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
        $newsPiki = NewsPiki::find($id);
        return view('admin/editberita', [
            "title" => "PIKI - Sangrid",
            "menu" => "Berita",
            "creator" => "San",
            "item" => $newsPiki,
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
        if ($request->file('picture_path')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            // dd($request->file('picture_path'));
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/news/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            NewsPiki::where('id', $request->id)
                ->update([
                    'picture_path' => $nama_file,
                ]);
            }
            NewsPiki::where('id', $request->id)
                ->update([
                    'keterangan_foto' => $request->keterangan_foto,
                    'isi_berita' => $request->isi_berita,
                ]);


        // return response()->json($newsPiki);
        return redirect()->route('berita');
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
        return redirect()->back();
    }
}
