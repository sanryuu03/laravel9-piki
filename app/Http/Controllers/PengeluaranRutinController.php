<?php

namespace App\Http\Controllers;

use App\Models\PosAnggaran;
use App\Models\NamaKegiatan;
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
        $posAnggaran = PosAnggaran::get();
        return view('admin/formPengeluaranRutin', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form tambah pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'pengeluaranRutin' => $pengeluaranRutin,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    public function saveFormPengeluaranRutin(Request $request)
    {
        // return $request;
        // return $request->action;
        $posAnggaran = PosAnggaran::where('id', $request->pos_anggarans_id)->first();
        $namakegiatan = NamaKegiatan::where('id', $request->nama_kegiatan)->first();
        // return $posAnggaran->nama_pos_anggaran;
        // return $namakegiatan->nama_kegiatan;
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
                'pos_anggaran' => 'nullable',
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

            $data['pos_anggaran'] = $posAnggaran->nama_pos_anggaran;
            $data['nama_kegiatan'] = $namakegiatan->nama_kegiatan;
            PengeluaranRutin::create($data);
            return redirect()->route('backend.form.add.pengeluaran.rutin')->with('success', 'Pengeluaran Rutin telah ditambahkan');
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
        if (auth()->user()->level == 'super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level == 'spi') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level == 'bendahara') {
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
        if (auth()->user()->level == 'super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level == 'spi') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level == 'bendahara') {
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
            'menu' => 'Pengeluaran Rutin Diproses',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'item' => $pengeluaranRutin,
        ]);
    }

    public function formPengeluaranRutinViaKetua($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $pengeluaranRutin = PengeluaranRutin::find($id);
        return view('admin/formPengeluaranRutinViaKetua', [
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

    public function postPengeluaranRutinViaKetua(Request $request)
    {
        $pengeluaranRutin = PengeluaranRutin::find($request->id);
        if ($pengeluaranRutin->status_verifikasi_ketua == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi Ketua');
        }
        if ($pengeluaranRutin->status_verifikasi_bendahara == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status_pengeluaran'] = 'pengeluaran diproses';
            $data['status_verifikasi_ketua'] = 'terverifikasi';
            PengeluaranRutin::where('id', $request->id)
                ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('success', 'Pengeluaran Rutin telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin gagal diverifikasi Ketua');
        }
    }

    public function postPengeluaranRutinViaKetuaViaForm(Request $request)
    {
        $data = PengeluaranRutin::find($request->id);
        if ($data->status_verifikasi_ketua == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi Ketua');
        }
        if ($data->status_verifikasi_bendahara == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            PengeluaranRutin::where('id', $request->id)
                ->update(
                    [
                        'jumlah' => $rupiahHapusSimbolRp,
                        'status_pengeluaran' => 'pengeluaran diproses',
                        'status_verifikasi_ketua' => 'terverifikasi',
                    ]
                );
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('success', 'Pengeluaran Rutin telah diverifikasi Ketua');
        }
         else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin gagal diverifikasi Ketua');
        }
    }

    public function formPengeluaranRutinViaSpi($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $pengeluaranRutin = PengeluaranRutin::find($id);
        return view('admin/formPengeluaranRutinViaSpi', [
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

    public function postPengeluaranRutinViaSpi(Request $request)
    {
        // return $request;
        $pengeluaranRutin = PengeluaranRutin::find($request->id);
        if ($pengeluaranRutin->status_verifikasi_spi == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diterima')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi SPI');
        }
        if ($pengeluaranRutin->status_verifikasi_bendahara == 'terverifikasi' && $pengeluaranRutin->status_verifikasi_ketua == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status_pengeluaran'] = 'pengeluaran terverifikasi';
            $data['status_verifikasi_spi'] = 'terverifikasi';
            PengeluaranRutin::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('success', 'Pengeluaran Rutin telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin gagal diverifikasi SPI');
        }
    }

    public function postPengeluaranRutinViaSpiViaForm(Request $request)
    {
        $data = PengeluaranRutin::find($request->id);
        if ($data->status_verifikasi_spi == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diterima')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi SPI');
        }
        if ($data->status_verifikasi_bendahara == 'terverifikasi' && $data->status_verifikasi_ketua == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            PengeluaranRutin::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status_pengeluaran' => 'pengeluaran terverifikasi',
                    'status_verifikasi_spi' => 'terverifikasi',
                    ]
            );
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('success', 'Pengeluaran Rutin telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin gagal diverifikasi SPI');
        }
    }

    public function pengeluaranRutinDiterima()
    {
        $user = auth()->user()->id;
        $pengeluaranRutin = PengeluaranRutin::where('status_pengeluaran', 'pengeluaran terverifikasi')->get();
        return view('admin/pengeluaranRutinDiterima', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Diterima',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'item' => $pengeluaranRutin,
        ]);
    }

    public function pengeluaranRutinDitolak()
    {
        $user = auth()->user()->id;
        $pengeluaranRutin = PengeluaranRutin::where('status_pengeluaran', 'pengeluaran ditolak')->get();
        return view('admin/pengeluaranRutinDitolak', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Ditolak',
            "creator" => $user,
            'summary' => 'ringkasan',
            'pengeluaranRutin' => $pengeluaranRutin,
            'item' => $pengeluaranRutin,
        ]);
    }

    public function postPengeluaranRutinDitolak(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $data['status_pengeluaran'] = 'pengeluaran ditolak';
        $data['alasan_ditolak'] = $request->alasan_ditolak . ' OLEH '. strtoupper(auth()->user()->name);
        $pengeluaranRutin = PengeluaranRutin::find($request->id);
        if ($pengeluaranRutin->alasan_ditolak == null && auth()->user()->level=='bendahara') {
            $data['status_verifikasi_bendahara'] = 'ditolak';
            PengeluaranRutin::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.ditolak')->with('success', 'Pengeluaran Rutin telah ditolak');
        }
        elseif ($pengeluaranRutin->alasan_ditolak == null && $pengeluaranRutin->status_verifikasi_bendahara == null && $pengeluaranRutin->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($pengeluaranRutin->alasan_ditolak == null && $pengeluaranRutin->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($pengeluaranRutin->alasan_ditolak == null && $pengeluaranRutin->status_verifikasi_bendahara == null && auth()->user()->level=='super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($pengeluaranRutin->alasan_ditolak == null && auth()->user()->level=='super-admin') {
            $data['status_verifikasi_ketua'] = 'ditolak';
            PengeluaranRutin::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.ditolak')->with('success', 'Pengeluaran Rutin telah ditolak');
        }
        elseif ($pengeluaranRutin->alasan_ditolak == null && auth()->user()->level=='spi') {
            $data['status_verifikasi_spi'] = 'ditolak';
            PengeluaranRutin::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.ditolak')->with('success', 'Pengeluaran Rutin telah ditolak');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin sudah pernah telah ditolak');
        }

    }

    public function postPengeluaranRutinDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        PengeluaranRutin::where('id', $request->id)
        ->update($data);
        $pengeluaranRutin = PengeluaranRutin::find($request->id);
        $pengeluaranRutin->delete(); //softdeletes

        return redirect()->back()->with('success', 'Pengeluaran Rutin telah dihapus');
    }
}
