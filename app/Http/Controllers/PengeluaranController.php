<?php

namespace App\Http\Controllers;

use App\Models\PosAnggaran;
use App\Models\NamaKegiatan;
use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\SubMenuNavbarKeuangan;
use DateTime;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $Pengeluaran = Pengeluaran::get();
        return view('admin/pengeluaranRutin', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin PIKI SUMUT',
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
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
     * @param  \App\Models\Pengeluaran  $Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $Pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $Pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $Pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $Pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $Pengeluaran)
    {
        //
    }

    public function pengeluaranBaru()
    {
        $user = auth()->user()->id;
        $Pengeluaran = Pengeluaran::where('status_pengeluaran', 'pengeluaran baru')->get();
        return view('admin/pengeluaranRutinBaru', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Baru',
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
        ]);
    }

    public function formAddPengeluaran(Pengeluaran $Pengeluaran)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $posAnggaran = PosAnggaran::get();
        $jenisPengeluaran = SubMenuNavbarKeuangan::where('master_menu_navbars_id', 2)->get();
        return view('admin/formPengeluaranRutin', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form tambah pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'posAnggaran' => $posAnggaran,
            'Pengeluaran' => $Pengeluaran,
            'jenisPengeluaran' => $jenisPengeluaran,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    public function saveFormPengeluaran(Request $request)
    {
        // return $request;
        // return $request->action;
        $posAnggaran = PosAnggaran::where('id', $request->pos_anggarans_id)->first();
        $namakegiatan = NamaKegiatan::where('id', $request->nama_kegiatan)->first();
        $jenisSetoran = SubMenuNavbarKeuangan::where('id', $request->pos_anggarans_id)->first();
        // return $posAnggaran->nama_pos_anggaran;
        // return $namakegiatan->nama_kegiatan;
        if ($request->action == "add") {
            $pesanError = [
                'pos_anggaran' => 'wajib di isi',
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

            $data['pos_anggaran'] = $jenisSetoran->nama_sub_menu;
            $data['tanggal'] = str_replace('/', '-', request()->tanggal);
            Pengeluaran::create($data);
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

                $result = Pengeluaran::where('id', $request->id)->update([
                    'picture_path_bukti_pengeluaran_rutin' => $nama_file,
                    'edited_by' => $request->edited_by,
                ]);

                // return response()->json([$result]);
                return redirect()->route('backend.keuangan')->with('success', 'Gambar Bukti Pengeluaran telah diedit');
            }

            $data = $request->except(['_token', 'action']);
            Pengeluaran::where('id', $request->id)->update($data);
            return redirect()->route('backend.keuangan')->with('success', 'Pengeluaran Rutin telah diedit');
        }
    }

    public function formEditPengeluaran($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $Pengeluaran = Pengeluaran::find($id);
        return view('admin/formPengeluaran', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form edit pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function formPengeluaranViaBendahara($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $Pengeluaran = Pengeluaran::find($id);
        return view('admin/formPengeluaranRutinViaBendahara', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'item' => $Pengeluaran,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function postPengeluaranViaBendahara(Request $request)
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
            Pengeluaran::where('id', $request->id)
                ->update($data);


            return redirect()->route('backend.pengeluaran.rutin.baru')->with('success', 'Pengeluaran Rutin telah diverifikasi bendahara');
        }
    }

    public function postPengeluaranViaBendaharaViaForm(Request $request)
    {
        if (auth()->user()->level == 'super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level == 'spi') {
            return redirect()->route('backend.pengeluaran.rutin.baru')->with('unapproved', 'Pengeluaran Rutin belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level == 'bendahara') {
            $data = Pengeluaran::find($request->id);
            // return $data;
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pengeluaran::where('id', $request->id)
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

    public function pengeluaranDiproses()
    {
        $user = auth()->user()->id;
        $Pengeluaran = Pengeluaran::where('status_pengeluaran', 'pengeluaran diproses')->get();
        return view('admin/pengeluaranRutinDiproses', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Diproses',
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'item' => $Pengeluaran,
        ]);
    }

    public function formPengeluaranViaKetua($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $Pengeluaran = Pengeluaran::find($id);
        return view('admin/formPengeluaranViaKetua', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'item' => $Pengeluaran,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function postPengeluaranViaKetua(Request $request)
    {
        $Pengeluaran = Pengeluaran::find($request->id);
        if ($Pengeluaran->status_verifikasi_ketua == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi Ketua');
        }
        if ($Pengeluaran->status_verifikasi_bendahara == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status_pengeluaran'] = 'pengeluaran diproses';
            $data['status_verifikasi_ketua'] = 'terverifikasi';
            Pengeluaran::where('id', $request->id)
                ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('success', 'Pengeluaran Rutin telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin gagal diverifikasi Ketua');
        }
    }

    public function postPengeluaranViaKetuaViaForm(Request $request)
    {
        $data = Pengeluaran::find($request->id);
        if ($data->status_verifikasi_ketua == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi Ketua');
        }
        if ($data->status_verifikasi_bendahara == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pengeluaran::where('id', $request->id)
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

    public function formPengeluaranViaSpi($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $Pengeluaran = Pengeluaran::find($id);
        return view('admin/formPengeluaranViaSpi', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form pengeluaran rutin PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'item' => $Pengeluaran,
            'namaUser' => $namaUser,
            'action' => 'edit',
        ]);
    }

    public function postPengeluaranViaSpi(Request $request)
    {
        // return $request;
        $Pengeluaran = Pengeluaran::find($request->id);
        if ($Pengeluaran->status_verifikasi_spi == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diterima')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi SPI');
        }
        if ($Pengeluaran->status_verifikasi_bendahara == 'terverifikasi' && $Pengeluaran->status_verifikasi_ketua == 'terverifikasi') {
            $data = $request->except('_token');
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status_pengeluaran'] = 'pengeluaran terverifikasi';
            $data['status_verifikasi_spi'] = 'terverifikasi';
            Pengeluaran::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('success', 'Pengeluaran Rutin telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin gagal diverifikasi SPI');
        }
    }

    public function postPengeluaranViaSpiViaForm(Request $request)
    {
        $data = Pengeluaran::find($request->id);
        if ($data->status_verifikasi_spi == 'terverifikasi') {
            return redirect()->route('backend.pengeluaran.rutin.diterima')->with('process', 'Pengeluaran Rutin sudah pernah diverifikasi SPI');
        }
        if ($data->status_verifikasi_bendahara == 'terverifikasi' && $data->status_verifikasi_ketua == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pengeluaran::where('id', $request->id)
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

    public function pengeluaranDiterima()
    {
        $user = auth()->user()->id;
        $Pengeluaran = Pengeluaran::where('status_pengeluaran', 'pengeluaran terverifikasi')->get();
        return view('admin/pengeluaranDiterima', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Diterima',
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'item' => $Pengeluaran,
        ]);
    }

    public function pengeluaranDitolak()
    {
        $user = auth()->user()->id;
        $Pengeluaran = Pengeluaran::where('status_pengeluaran', 'pengeluaran ditolak')->get();
        return view('admin/pengeluaranDitolak', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => 'Pengeluaran Rutin Ditolak',
            "creator" => $user,
            'summary' => 'ringkasan',
            'Pengeluaran' => $Pengeluaran,
            'item' => $Pengeluaran,
        ]);
    }

    public function postPengeluaranDitolak(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $data['status_pengeluaran'] = 'pengeluaran ditolak';
        $data['alasan_ditolak'] = $request->alasan_ditolak . ' OLEH '. strtoupper(auth()->user()->name);
        $Pengeluaran = Pengeluaran::find($request->id);
        if ($Pengeluaran->alasan_ditolak == null && auth()->user()->level=='bendahara') {
            $data['status_verifikasi_bendahara'] = 'ditolak';
            Pengeluaran::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.ditolak')->with('success', 'Pengeluaran Rutin telah ditolak');
        }
        elseif ($Pengeluaran->alasan_ditolak == null && $Pengeluaran->status_verifikasi_bendahara == null && $Pengeluaran->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($Pengeluaran->alasan_ditolak == null && $Pengeluaran->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($Pengeluaran->alasan_ditolak == null && $Pengeluaran->status_verifikasi_bendahara == null && auth()->user()->level=='super-admin') {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($Pengeluaran->alasan_ditolak == null && auth()->user()->level=='super-admin') {
            $data['status_verifikasi_ketua'] = 'ditolak';
            Pengeluaran::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.ditolak')->with('success', 'Pengeluaran Rutin telah ditolak');
        }
        elseif ($Pengeluaran->alasan_ditolak == null && auth()->user()->level=='spi') {
            $data['status_verifikasi_spi'] = 'ditolak';
            Pengeluaran::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.pengeluaran.rutin.ditolak')->with('success', 'Pengeluaran Rutin telah ditolak');
        }
        else {
            return redirect()->route('backend.pengeluaran.rutin.diproses')->with('unapproved', 'Pengeluaran Rutin sudah pernah telah ditolak');
        }

    }

    public function postPengeluaranDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        Pengeluaran::where('id', $request->id)
        ->update($data);
        $Pengeluaran = Pengeluaran::find($request->id);
        $Pengeluaran->delete(); //softdeletes

        return redirect()->back()->with('success', 'Pengeluaran Rutin telah dihapus');
    }
}
