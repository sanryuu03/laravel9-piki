<?php

namespace App\Http\Controllers;

use App\Models\HeaderPikiMobile;
use Illuminate\Http\Request;

class HeaderPikiMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'picture_path' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();
        // return response()->json($nama_file);

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/header/mobile/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        HeaderPikiMobile::create([
            'picture_path' => $nama_file,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeaderPikiMobile  $headerPikiMobile
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderPikiMobile $headerPikiMobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderPikiMobile  $headerPikiMobile
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderPikiMobile $headerPikiMobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderPikiMobile  $headerPikiMobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderPikiMobile $headerPikiMobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeaderPikiMobile  $headerPikiMobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderPikiMobile $headerPikiMobile, $id)
    {
        $headerPikiMobile = HeaderPikiMobile::find($id);
        $headerPikiMobile->delete();
        return redirect()->back();
    }
}
