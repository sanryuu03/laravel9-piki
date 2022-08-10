<?php

namespace App\Http\Controllers;

use App\Models\SponsorShipSatu;
use Illuminate\Http\Request;

class SponsorShipSatuController extends Controller
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
        // return $request;
        if ($request->action == "add") {
            $data = $request->except('_token');

            if ($request->file('picture_path')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/sponsorshipsatu/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }

            SponsorShipSatu::create($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship Berhasil Dilakukan, Terima Kasih !');
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
                $tujuan_upload = 'storage/assets/sponsorshipsatu/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }
            SponsorShipSatu::where('id', $request->id)->update($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorShipSatu  $sponsorShipSatu
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorShipSatu $sponsorShipSatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorShipSatu  $sponsorShipSatu
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorShipSatu $sponsorShipSatu)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formSponsorShipSatu', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('sponsor ship satu'),
            "creator" => $user,
            "namaUser" => $namaUser,
            "sponsorShipSatu" => $sponsorShipSatu,
            "action" => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorShipSatu  $sponsorShipSatu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorShipSatu $sponsorShipSatu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorShipSatu  $sponsorShipSatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorShipSatu $sponsorShipSatu)
    {
        {
            $data = ['deleted_by' => auth()->user()->name];
            // return $partnerShip;
            SponsorShipSatu::where('id', $sponsorShipSatu->id)
            ->update($data);
            $sponsorShipSatu->id;
            $sponsorShipSatu->delete();
            return redirect()->back()->with('success', 'Sponsorship telah dihapus');
        }
    }
}
