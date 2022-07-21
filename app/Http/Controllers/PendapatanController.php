<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\IuranPiki;
use App\Models\Pendapatan;
use App\Models\AnggotaPiki;
use App\Models\DataRekening;
use App\Models\NamaKegiatan;
use Illuminate\Http\Request;
use App\Models\SumbanganPiki;
use App\Models\DataBiayaIuran;
use App\Models\jenisPemasukan;
use App\Models\LaporanKeuangan;

class PendapatanController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendapatan $pendapatan)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $dataRekening = DataRekening::latest()->first();
        $jenisPemasukan = jenisPemasukan::all();
        $dataBiayaIuran = DataBiayaIuran::latest()->first();
        $userDiterima = User::where('status_anggota', 'diterima')->get();
        return view('admin/formPendapatan', [
            "title" => "PIKI - Iuran",
            "menu" => ucwords("input pendapatan"),
            "creator" => $user,
            'summary' => 'ringkasan',
            'userDiterima' => $userDiterima,
            'pendapatan' => $pendapatan,
            'dataRekening' => $dataRekening,
            'jenisPemasukan' => $jenisPemasukan,
            'dataBiayaIuran' => $dataBiayaIuran,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendapatan $pendapatan)
    {
        //
    }

    public function saveFormInput(Request $request)
    {
        // return $request;
        // return $request->action;
        if ($request->action == "add") {
            if ($request->jenis_setoran == null) {
                return redirect()->route('iuran', $request->id)->with('unapproved', 'Jenis Setoran Belum Dipilih !');
            }
            if ($request->jenis_setoran == 1) {
                $data = $request->except('_token');
                $data['tanggal'] = now();
                $namaBulan = $_POST['bulan'];
                $arrBulan = [];
                foreach ($namaBulan as $bulan){
                    array_push($arrBulan, $bulan);
                }
                // return $arrBulan;
                // return $data['iuran_bulan'] = $arrBulan;
                // return implode(", ",$arrBulan);
                // return implode(", ",$data['iuran_bulan'] = $arrBulan);
                $data['iuran_bulan'] = implode(", ",$arrBulan);
                if (request()->input('jumlah')) {
                    $dataRupiah = $request->jumlah;
                    $rupiah = str_replace(".", "", $dataRupiah);
                    $data['jumlah'] = $rupiah;
                }
                $jenisPemasukan = jenisPemasukan::where('id', $request->jenis_setoran)->get();
                $namaJenisPemasukan = $jenisPemasukan[0]->jenis_pemasukan;
                $data['jenis_setoran'] = $namaJenisPemasukan;

                if ($request->file('picture_path_slip_setoran_iuran')) {
                    // menyimpan data file yang diupload ke variabel $file
                    $file = $request->file('picture_path_slip_setoran_iuran');
                    $nama_file = time() . "_" . $file->getClientOriginalName();
                    // dd($nama_file);

                    // isi dengan nama folder tempat kemana file diupload
                    $tujuan_upload = 'storage/assets/slip/setoran/iuran/';

                    // upload file
                    $file->move($tujuan_upload, $nama_file);

                    $data['picture_path_slip_setoran_iuran'] = $nama_file;
                }

                IuranPiki::create($data);
                return redirect()->route('backend.pendapatan')->with('success', 'Iuran Berhasil Dilakukan, Terima Kasih !');
            }
            if ($request->jenis_setoran == 2) {
                $data = $request->except('_token');
                $data['tanggal'] = now();
                $dataRupiah = $request->jumlah;
                $rupiah = str_replace(".","",$dataRupiah);
                $data['jumlah'] = $rupiah;

                if ($request->file('picture_path_slip_setoran_iuran')) {
                    // menyimpan data file yang diupload ke variabel $file
                    $file = $request->file('picture_path_slip_setoran_iuran');
                    $nama_file = time() . "_" . $file->getClientOriginalName();
                    // dd($nama_file);

                    // isi dengan nama folder tempat kemana file diupload
                    $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

                    // upload file
                    $file->move($tujuan_upload, $nama_file);

                    $data['picture_path_slip_setoran_iuran'] = $nama_file;
                }

                $jenisPemasukan = jenisPemasukan::where('id', $request->jenis_setoran)->get();
                $namaJenisPemasukan = $jenisPemasukan[0]->jenis_pemasukan;
                $data['jenis_setoran'] = $namaJenisPemasukan;

                $data['status'] = 'sumbangan baru';


                IuranPiki::create($data);
                return redirect()->route('backend.pendapatan')->with('success', 'Sumbangan Berhasil Dilakukan, Terima Kasih !');
            }
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            NamaKegiatan::where('id', $request->id)->update($data);
            return redirect()->route('backend.nama.kegiatan')->with('success', 'Nama Kegiatan telah diedit');
        }
    }

    public function dataUser(Request $request)
    {
        $nama = $request->nama_penyumbang;
        // return request()->input('provinsi');
        $namaPenyumbang = User::where('name', $nama)->get();
        // return $namaPenyumbang;
        $option = "<option>==Pilih No Telepon==</option>";
        foreach($namaPenyumbang as $dataUser){
            $option .= "<option value='$dataUser->phone_number'>$dataUser->phone_number</option>";
        }
        echo $option;
    }
}
