<?php

namespace App\Http\Controllers;

use App\Models\SponsorshipNewsCategories;
use Illuminate\Http\Request;

class SponsorshipNewsCategoriesController extends Controller
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
                $tujuan_upload = 'storage/assets/sponsorshipnewscategories/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }

            SponsorshipNewsCategories::create($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship di kategori berita Berhasil Dilakukan, Terima Kasih !');
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
                $tujuan_upload = 'storage/assets/sponsorshipnewscategories/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }
            SponsorshipNewsCategories::where('id', $request->id)->update($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship di kategori berita telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorshipNewsCategories  $sponsorshipNewsCategories
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorshipNewsCategories $sponsorshipNewsCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorshipNewsCategories  $sponsorshipNewsCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorshipNewsCategories $sponsorshipNewsCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorshipNewsCategories  $sponsorshipNewsCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorshipNewsCategories $sponsorshipNewsCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorshipNewsCategories  $sponsorshipNewsCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ['deleted_by' => auth()->user()->name];
        // return $id;
        SponsorshipNewsCategories::where('id', $id)
        ->update($data);
        $sponsorshipNewsCategories = SponsorshipNewsCategories::find($id);
        $sponsorshipNewsCategories->delete();
        return redirect()->back()->with('success', 'Sponsorship News Categories telah dihapus');
    }
}
