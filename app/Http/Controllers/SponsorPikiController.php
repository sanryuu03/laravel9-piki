<?php

namespace App\Http\Controllers;

use App\Models\SponsorPiki;
use Illuminate\Http\Request;

class SponsorPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsor = SponsorPiki::take(7)->get();
        $user = auth()->user()->id;
        return view('admin/communitypartners', [
            "title" => "PIKI - SUMUT",
            "menu" => "Community Partners",
            "creator" => $user,
            "sponsor" => $sponsor,
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
            'konten_sponsor' => 'required',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/sponsor/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        SponsorPiki::create([
            "konten_sponsor" => $data['konten_sponsor'],
            'picture_path' => $nama_file,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorPiki  $sponsorPiki
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorPiki $sponsorPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorPiki  $sponsorPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorPiki $sponsorPiki, $id)
    {
        $sponsorPiki = SponsorPiki::find($id);
        return view('admin/editcommunitypartners', [
            "title" => "PIKI - SUMUT",
            "menu" => "Community Partners",
            "creator" => "San",
            "item" => $sponsorPiki,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorPiki  $sponsorPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorPiki $sponsorPiki)
    {
        if ($request->file('picture_path')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            // dd($request->file('picture_path'));
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/sponsor/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            SponsorPiki::where('id', $request->id)
                ->update([
                    'picture_path' => $nama_file,
                ]);
        }
        SponsorPiki::where('id', $request->id)
            ->update([
                'konten_sponsor' => $request->konten_sponsor,
            ]);


        return redirect()->route('communitypartners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorPiki  $sponsorPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorPiki $sponsorPiki, $id)
    {
        $sponsorPiki = SponsorPiki::find($id);
        $sponsorPiki->delete();
        return redirect()->back();
    }
}
