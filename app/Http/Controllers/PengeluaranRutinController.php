<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengeluaranRutin;

class PengeluaranRutinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $pengeluaranRutin = PengeluaranRutin::get();
        return view('admin/pengeluaranRutin', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
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
     * @param  \App\Models\PengeluaranRutin  $pengeluaranRutin
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranRutin $pengeluaranRutin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranRutin  $pengeluaranRutin
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranRutin $pengeluaranRutin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranRutin  $pengeluaranRutin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengeluaranRutin $pengeluaranRutin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranRutin  $pengeluaranRutin
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengeluaranRutin $pengeluaranRutin)
    {
        //
    }

    public function pengeluaranRutinBaru()
    {
        $user = auth()->user()->id;
        $pengeluaranRutin = PengeluaranRutin::where('status_pengeluaran', 'pengeluaran baru')->get();
        return view('admin/pengeluaranRutinBaru', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Baru',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
        ]);
    }

    public function formAddPengeluaranRutin(PengeluaranRutin $pengeluaranRutin)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formPengeluaranRutin', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form tambah pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    public function saveFormPengeluaranRutin(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            $pesanError = [
                'pos_anggaran' => 'wajib di isi',
                'nama_kegiatan' => 'wajib di isi',
                'tanggal' => 'wajib di isi',
                'uraian_pengeluaran' => 'wajib di isi',
                'volume' => 'wajib di isi',
                'satuan' => 'wajib di isi',
                'harga_satuan' => 'wajib di isi',
                'berita' => 'wajib di isi',
                'picture_path_bukti_pengeluaran_rutin.max' => 'Gambar Melebihi 2MB',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'pos_anggaran' => 'required',
                'nama_kegiatan' => 'required',
                'tanggal' => 'required',
                'uraian_pengeluaran' => 'required',
                'volume' => 'required',
                'satuan' => 'required',
                'harga_satuan' => 'required',
                'jumlah' => 'required',
                'berita' => 'required',
                'picture_path_bukti_pengeluaran_rutin' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'post_by' => 'required',
            ], $pesanError);
            if (!$request->file('picture_path_bukti_pengeluaran_rutin')) {
                return back()
                ->withInput()
                ->withErrors([
                    'picture_path_bukti_pengeluaran_rutin' => 'Gambar belum di upload '
                ]);
            }
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path_bukti_pengeluaran_rutin');
            // dd($request->file('picture_path'));
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/pengeluaran/rutin/';


            // upload file
            $file->move($tujuan_upload, $nama_file);
            $data['picture_path_bukti_pengeluaran_rutin'] = $nama_file;
            PengeluaranRutin::create($data);
            return redirect()->route('backend.keuangan')->with('success', 'Pengeluaran Rutin telah ditambahkan');
        }
        if ($request->action == "edit") {
            // return $request->id;
            if ($request->file('picture_path_bukti_pengeluaran_rutin')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_bukti_pengeluaran_rutin');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/pengeluaran/rutin/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $result = PengeluaranRutin::where('id', $request->id)->update([
                    'picture_path_bukti_pengeluaran_rutin' => $nama_file,
                    'edited_by' => $request->edited_by,
                ]);

                // return response()->json([$result]);
                return redirect()->route('backend.keuangan')->with('success', 'Gambar Bukti Pengeluaran telah diedit');
            }

            $data = $request->except(['_token', 'action']);
            PengeluaranRutin::where('id', $request->id)->update($data);
            return redirect()->route('backend.keuangan')->with('success', 'Pengeluaran Rutin telah diedit');
        }
    }

    public function formEditPengeluaranRutin($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $pengeluaranRutin = PengeluaranRutin::find($id);
        return view('admin/formPengeluaranRutin', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form edit pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function formPengeluaranRutinViaBendahara($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $pengeluaranRutin = PengeluaranRutin::find($id);
        return view('admin/formPengeluaranRutinViaBendahara', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'item' => $pengeluaranRutin,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function postPengeluaranRutinViaBendahara(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status_pengeluaran'] = 'pengeluaran diproses';
            $data['status_verifikasi_bendahara'] = 'terverifikasi';
            PengeluaranRutin::where('id', $request->id)
            ->update($data);


            return redirect()->route('backend.pengeluaran.rutin.baru')->with('success', 'Pengeluaran Rutin telah diverifikasi bendahara');
        }
    }

    public function postPengeluaranRutinViaBendaharaViaForm(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = PengeluaranRutin::find($request->id);
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            PengeluaranRutin::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status_pengeluaran' => 'pengeluaran diproses',
                    'status_verifikasi_bendahara' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.pengeluaran.rutin.baru')->with('success', 'Pengeluaran Rutin telah diverifikasi bendahara');
        }
    }

    public function pengeluaranRutinDiproses()
    {
        $user = auth()->user()->id;
        $pengeluaranRutin = PengeluaranRutin::where('status_pengeluaran', 'pengeluaran diproses')->get();
        return view('admin/pengeluaranRutinDiproses', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pemasukan Sumbangan Diproses',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'item' => $pengeluaranRutin,
        ]);
    }
}
