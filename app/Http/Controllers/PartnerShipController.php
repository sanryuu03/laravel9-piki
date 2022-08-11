<?php

namespace App\Http\Controllers;

use App\Models\PartnerShip;
use App\Models\SponsorshipBeforeFaq;
use App\Models\SponsorShipDua;
use App\Models\SponsorShipSatu;
use App\Models\SponsorShipTiga;
use Illuminate\Http\Request;

class PartnerShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerShip = PartnerShip::get();
        $sponsorShipSatu = SponsorShipSatu::latest()->first();
        $sponsorShipDua = SponsorShipDua::latest()->first();
        $sponsorShipTiga = SponsorShipTiga::latest()->first();
        $sponsorshipBeforeFaq = SponsorshipBeforeFaq::get();
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/partnership', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('partner ship'),
            "creator" => $user,
            "partnerShip" => $partnerShip,
            "sponsorShipSatu" => $sponsorShipSatu,
            "sponsorShipDua" => $sponsorShipDua,
            "sponsorShipTiga" => $sponsorShipTiga,
            "sponsorshipBeforeFaq" => $sponsorshipBeforeFaq,
            "action" => 'add',
            "namaUser" => $namaUser,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formPartnerShip', [
            "title" => "PIKI - SUMUT",
            "menu" => "Program",
            "creator" => $user,
            "namaUser" => $namaUser,
            "action" => 'add',
        ]);
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
                $tujuan_upload = 'storage/assets/partnership/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }

            PartnerShip::create($data);
            return redirect()->route('partnerShip.index')->with('success', 'Partnership Berhasil Dilakukan, Terima Kasih !');
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
                $tujuan_upload = 'storage/assets/partnership/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path'] = $nama_file;
            }
            PartnerShip::where('id', $request->id)->update($data);
            return redirect()->route('partnerShip.index')->with('success', 'Partnership telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerShip  $partnerShip
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerShip $partnerShip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerShip  $partnerShip
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerShip $partnerShip)
    {
        // return $partnerShip->id;
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formPartnerShip', [
            "title" => "PIKI - SUMUT",
            "menu" => "Program",
            "creator" => $user,
            "namaUser" => $namaUser,
            "partnerShip" => $partnerShip,
            "action" => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerShip  $partnerShip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerShip $partnerShip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerShip  $partnerShip
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerShip $partnerShip)
    {
        $data = ['deleted_by' => auth()->user()->name];
        // return $partnerShip;
        PartnerShip::where('id', $partnerShip->id)
        ->update($data);
        $partnerShip->id;
        $partnerShip->delete();
        return redirect()->back()->with('success', 'Partnership telah dihapus');
    }
}
