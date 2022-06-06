<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AnggotaPiki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\Snappy\Facades\SnappyPdf; //import Fungsi PDF
use Spatie\Browsershot\Browsershot;

class AnggotaPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = AnggotaPiki::all();
        // return $anggota;
        // return $anggota->name;
        // return $anggota[0]->name;
        // return $anggota->userPiki;
        $user = User::get();
        return view('admin/landingpageanggota', [
            "title" => "PIKI - Sangrid",
            "menu" => "Anggota",
            "creator" => "San",
            "anggota" => $anggota,
            "user" => $user,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => "CV Anggota",
            "creator" => "San",
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "action" => "view",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnggotaPiki $anggotaPiki, $id)
    {
        $anggotaPiki = AnggotaPiki::find($id);
        $user = User::find($id);
        $id = $request->value;
        // penggunaan http://192.168.1.7:8000/admin/landingpageanggota/edit/1?value=heheh
        return view('admin/anggotacv', [
            "title" => "PIKI - Sangrid",
            "menu" => "Edit CV Anggota",
            "creator" => "San",
            "anggotaPiki" => $anggotaPiki,
            "item" => $user,
            "id" => $id,
            "action" => "edit",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaPiki $anggotaPiki)
    {
        if ($request->file('picture_path')) {
            // jika gambar lama ada, maka hapus gambar lama
            if ($request->picture_path) {
                Storage::delete($request->picture_path);
            }
            $data['photo_profile'] = $request->file('picture_path')->store('assets/user/profile');
            User::where('id', $request->id)
                ->update([
                    'photo_profile' => $data['photo_profile'],
                ]);
        }

        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'nik' => $request->nik,
                'address' => $request->address,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'village' => $request->village,
                'job' => $request->job,
                'description_of_skills' => $request->description_of_skills,
            ]);


        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaPiki  $anggotaPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaPiki $anggotaPiki, $id)
    {
        $user = User::find($id);
        if ($user->picture_path) {
            Storage::delete($user->picture_path);
        }
        $user->delete();
        return redirect()->back()->with('success', 'Data has been deleted !');
    }

    public function export($id)
    {
        $user = User::find($id);

        return view('admin/printcv', [
            "title" => "PIKI - Sangrid",
            "menu" => "Print CV Anggota",
            "creator" => "San",
            "item" => $user,
            "id" => $id,
            "action" => "print",
        ]);

        // $pdf = SnappyPdf::loadView('admin/printcv', $data);

        //Aktifkan Local File Access supaya bisa pakai file external ( cth File .CSS )
        // $pdf->setOption('enable-local-file-access', true);

        // Stream untuk menampilkan tampilan PDF pada browser
        // return $pdf->stream('anggotacv.pdf');

        // Jika ingin langsung download (tanpai melihat tampilannya terlebih dahulu) kalian bisa pakai fungsi download
        // return $pdf->download('anggotacv.pdf');
    }
}
