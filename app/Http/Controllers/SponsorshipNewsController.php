<?php

namespace App\Http\Controllers;

use App\Models\SponsorshipNews;
use Illuminate\Http\Request;

class SponsorshipNewsController extends Controller
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
        if ($request->action == "add") {
            // return request();
            $data = $request->except('_token');

            if ($request->file('picture_path')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/sponsorshipnews/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }

            SponsorshipNews::create($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship di berita Berhasil Dilakukan, Terima Kasih !');
        }
        if ($request->action == "edit") {
            // return $request->id;
            $data = $request->except('_token', 'action');

            // return $data;
            if ($request->file('picture_path')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/sponsorshipnews/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }
            SponsorshipNews::where('id', $request->id)->update($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship di berita telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorshipNews  $sponsorshipNews
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorshipNews $sponsorshipNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorshipNews  $sponsorshipNews
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorshipNews $sponsorshipNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorshipNews  $sponsorshipNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorshipNews $sponsorshipNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorshipNews  $sponsorshipNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorshipNews $sponsorshipNews)
    {
        //
    }
}
