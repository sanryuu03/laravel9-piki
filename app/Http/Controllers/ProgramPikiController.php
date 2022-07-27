<?php

namespace App\Http\Controllers;

use App\Models\ProgramPiki;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $user = auth()->user()->id;
        return view('admin/program', [
            "title" => "PIKI - Sangrid",
            "menu" => "Program",
            "creator" => $user,
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
            'picture_path' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('picture_path');
        // dd($request->file('picture_path'));
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/assets/program/';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        ProgramPiki::create([
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
        $data = ['deleted_by' => auth()->user()->name];
        ProgramPiki::where('id', request()->id)
        ->update($data);
        $programPiki = ProgramPiki::find($id);
        $programPiki->delete();
        return redirect()->back()->with('success', 'Program telah dihapus');
    }

    public function formAddProgram(ProgramPiki $programPiki)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formProgram', [
            "title" => "PIKI - Sangrid",
            "menu" => "Program",
            "creator" => $user,
            "namaUser" => $namaUser,
            "program" => $programPiki,
            "action" => 'add',
        ]);
    }

    public function saveFormProgram(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            // return request();
            $data = $request->except('_token');

            if ($request->file('picture_path_program')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_program');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/program/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path_program'] = $nama_file;
            }

            ProgramPiki::create($data);
            return redirect()->route('program')->with('success', 'Program Berhasil Dilakukan, Terima Kasih !');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $rules = [
                'judul_program' => 'required',
                'slug' => 'nullable',
                'keterangan_foto' => 'required',
                'isi_program' => 'required',

            ];

            if($request->slug != $request->slug)
            {
                $rules['slug'] = 'required|unique:program_pikis';
            }

            $data = $request->validate($rules);
            // return $data;
            if ($request->file('picture_path_program')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_program');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/program/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path_program'] = $nama_file;
            }
            ProgramPiki::where('id', $request->id)->update($data);
            return redirect()->route('program')->with('success', 'Program telah diedit');
        }
    }

    public function formEditProgram($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $programPiki = ProgramPiki::find($id);
        return view('admin/formProgram', [
            "title" => "PIKI - Sangrid",
            "menu" => "Program",
            "creator" => $user,
            "namaUser" => $namaUser,
            "program" => $programPiki,
            "action" => 'edit',
        ]);
    }
}
