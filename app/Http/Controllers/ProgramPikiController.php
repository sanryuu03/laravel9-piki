<?php

namespace App\Http\Controllers;

use App\Models\ProgramPiki;
use Illuminate\Http\Request;

class ProgramPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = ProgramPiki::take(7)->get();
        return view('admin/program', [
            "title" => "PIKI - Sangrid",
            "menu" => "Program",
            "creator" => "San",
            "program" => $program,
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
            'link_program' => 'required',
            'picture_path' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        ProgramPiki::create([
            "link_program" => $data['link_program'],
            'picture_path' => $nama_file,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramPiki  $programPiki
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramPiki $programPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramPiki  $programPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramPiki $programPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramPiki  $programPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramPiki $programPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramPiki  $programPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramPiki $programPiki, $id)
    {
        $programPiki = ProgramPiki::find($id);
        $programPiki->delete();
        return redirect()->back();
    }
}
