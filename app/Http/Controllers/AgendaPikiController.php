<?php

namespace App\Http\Controllers;

use App\Models\AgendaPiki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = AgendaPiki::get();
        return view('admin/landingpageagenda', [
            "title" => "PIKI - Sangrid",
            "menu" => "Agenda",
            "creator" => "San",
            "agenda" => $agenda,
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
            'nama_agenda' => 'required',
            'keterangan_agenda' => 'required',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/agenda/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        AgendaPiki::create([
            "nama_agenda" => $data['nama_agenda'],
            "keterangan_agenda" => $data['keterangan_agenda'],
            'picture_path' => $nama_file,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function show(AgendaPiki $agendaPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(AgendaPiki $agendaPiki, $id)
    {
        $agendaPiki = AgendaPiki::find($id);
        return view('admin/editagenda', [
            "title" => "PIKI - Sangrid",
            "menu" => "Agenda",
            "creator" => "San",
            "item" => $agendaPiki,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgendaPiki $agendaPiki)
    {
        if ($request->file('picture_path')) {
            // jika gambar lama ada, maka hapus gambar lama
            if ($request->old_picture_path) {
                Storage::delete($request->old_picture_path);
            }
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path');
            // dd($request->file('picture_path'));
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/agenda/';

            // upload file
            $file->move($tujuan_upload, $nama_file);
            AgendaPiki::where('id', $request->id)
                ->update([
                    'picture_path' => $nama_file,
                ]);
        }

        AgendaPiki::where('id', $request->id)
            ->update([
                'nama_agenda' => $request->nama_agenda,
                'keterangan_agenda' => $request->keterangan_agenda,
            ]);


        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgendaPiki $agendaPiki, $id)
    {
        $agendaPiki = AgendaPiki::find($id);
        if ($agendaPiki->picture_path) {
            Storage::delete($agendaPiki->picture_path);
        }
        $agendaPiki->delete();
        return redirect()->back()->with('success', 'Data has been deleted !');
    }
}
