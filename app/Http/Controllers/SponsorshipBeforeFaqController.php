<?php

namespace App\Http\Controllers;

use App\Models\SponsorshipBeforeFaq;
use Illuminate\Http\Request;

class SponsorshipBeforeFaqController extends Controller
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
        $data = $request->except('_token', 'action');

        // return $data;
        if ($request->file('iklan_1')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('iklan_1');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/sponsorshipBeforeFaq/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['iklan_1'] = $nama_file;
        }
        if ($request->file('iklan_2')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('iklan_2');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/sponsorshipBeforeFaq/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['iklan_2'] = $nama_file;
        }
        if ($request->file('iklan_3')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('iklan_3');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/sponsorshipBeforeFaq/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['iklan_3'] = $nama_file;
        }
        SponsorshipBeforeFaq::where('id', 1)->update($data);
        return redirect()->route('partnerShip.index')->with('success', 'Sponsorship di atas FAQ telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorshipBeforeFaq  $sponsorshipBeforeFaq
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorshipBeforeFaq $sponsorshipBeforeFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorshipBeforeFaq  $sponsorshipBeforeFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorshipBeforeFaq $sponsorshipBeforeFaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorshipBeforeFaq  $sponsorshipBeforeFaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorshipBeforeFaq $sponsorshipBeforeFaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorshipBeforeFaq  $sponsorshipBeforeFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorshipBeforeFaq $sponsorshipBeforeFaq)
    {
        // return request();
        // return $iklan;
        // return request()->iklan;
        // return request()->link_web;
        $data = [
            request()->iklan => '',
            request()->link_web => '',
        ];
        SponsorshipBeforeFaq::select($data)->update($data);
        return redirect()->route('partnerShip.index')->with('success', 'Sponsorship di atas FAQ telah dihapus');
    }
}
