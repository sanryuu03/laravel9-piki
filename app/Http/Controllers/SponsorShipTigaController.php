<?php

namespace App\Http\Controllers;

use App\Models\SponsorShipTiga;
use Illuminate\Http\Request;

class SponsorShipTigaController extends Controller
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
            $data = $request->except('_token');

            if ($request->file('picture_path')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/sponsorshiptiga/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }

            SponsorShipTiga::create($data);
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
                $tujuan_upload = 'storage/assets/sponsorshiptiga/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }
            SponsorShipTiga::where('id', $request->id)->update($data);
            return redirect()->route('partnerShip.index')->with('success', 'Sponsorship telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorShipTiga  $sponsorShipTiga
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorShipTiga $sponsorShipTiga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorShipTiga  $sponsorShipTiga
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorShipTiga $sponsorShipTiga)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formSponsorShipTiga', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('sponsor ship tiga'),
            "creator" => $user,
            "namaUser" => $namaUser,
            "sponsorShipTiga" => $sponsorShipTiga,
            "action" => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorShipTiga  $sponsorShipTiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorShipTiga $sponsorShipTiga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorShipTiga  $sponsorShipTiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorShipTiga $sponsorShipTiga)
    {
        {
            $data = ['deleted_by' => auth()->user()->name];
            // return $partnerShip;
            SponsorShipTiga::where('id', $sponsorShipTiga->id)
            ->update($data);
            $sponsorShipTiga->id;
            $sponsorShipTiga->delete();
            return redirect()->back()->with('success', 'Sponsorship telah dihapus');
        }
    }
}
