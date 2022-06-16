<?php

namespace App\Http\Controllers;

use App\Models\HeaderPiki;
use Illuminate\Http\Request;
use App\Models\HeaderPikiMobile;

class HeaderPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = HeaderPiki::get();
        $headerMobile = HeaderPikiMobile::get();
        $user = auth()->user()->id;
        return view('admin/landingpageheader', [
            "title" => "PIKI - Sangrid",
            "creator" => $user,
            'header' => $header,
            'headerMobile' => $headerMobile,
        ]);
    }

    public function proses_upload(Request $request)
    {

        $request->validate([
            'picture_path' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();
        // return response()->json($nama_file);

        // nama file
        echo 'File Name: ' . $file->getClientOriginalName();
        echo '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';

        // real path
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';

        // ukuran file
        echo 'File Size: ' . $file->getSize();
        echo '<br>';

        // tipe mime
        echo 'File Mime Type: ' . $file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/header/web/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        HeaderPiki::create([
            'picture_path' => $nama_file,
        ]);

        return redirect()->back();
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
     * @param  \App\Models\HeaderPiki  $headerPiki
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderPiki $headerPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderPiki  $headerPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderPiki $headerPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderPiki  $headerPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderPiki $headerPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeaderPiki  $headerPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderPiki $headerPiki, $id)
    {
        $headerPiki = HeaderPiki::find($id);
        $headerPiki->delete();
        return redirect()->back();
    }
}
