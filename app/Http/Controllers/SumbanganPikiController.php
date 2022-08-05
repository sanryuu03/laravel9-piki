<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\DataRekening;
use App\Models\Pendapatan;
use App\Models\SubMenuNavbarKeuangan;
use Illuminate\Http\Request;
use App\Models\SumbanganPiki;
use DateTime;


class SumbanganPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $dataRekening = DataRekening::latest()->first();
        $tujuan = SubMenuNavbarKeuangan::where('master_menu_navbars_id', 1)->get();
        return view('sumbanganPiki', [
            "title" => "PIKI - Sumbangan",
            "menu" => "Sumbangan",
            "creator" => "San",
            'provinces' => $provinces,
            'dataRekening' => $dataRekening,
            'tujuanSumbangan' => $tujuan,
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
        // return $request;
        if ($request->provinsi == 'Pilih Provinsi Anda') {
            $dataRupiah = $request->jumlah;
            $rupiah = str_replace(".","",$dataRupiah);
            $data = $request->except(['_token', 'provinsi', 'kabupaten', 'kecamatan', 'desa']);
            $data['tanggal'] = date('Y-m-d');
            $data['jumlah'] = $rupiah;
            $data['nama_penyumbang'] = $request->nama_penyetor;

            if ($request->file('picture_path_slip_setoran_sumbangan')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_slip_setoran_sumbangan');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path_slip_setoran_sumbangan'] = $nama_file;
            }

            SumbanganPiki::create($data);
            return redirect('/sumbanganPiki')->with('success', 'Sumbangan Berhasil Dilakukan, Terima Kasih !');
        }

        $dataRupiah = $request->jumlah;
        $rupiah = str_replace(".","",$dataRupiah);
        $data = $request->except('_token');
        $data['jumlah'] = $rupiah;
        $province = request()->input('provinsi');
        if ($province) {
            $province = Province::where('id', $province)->first();
            $namaProvince = $province->name;
            $data['provinsi'] = $namaProvince;
        }

        $regencies = request()->input('kota');
        if ($regencies) {
            $kota = Regency::where('id', $regencies)->first();
            $namaKota = $kota->name;
            $data['kabupaten'] = $namaKota;
        }

        $districts = request()->input('kecamatan');
        if ($districts) {
            $kecamatan = District::where('id', $districts)->first();
            $namaKecamatan = $kecamatan->name;
            $data['kecamatan'] = $namaKecamatan;
        }

        $villages = request()->input('desa');
        if ($villages) {
            $desa = Village::where('id', $villages)->first();
            $namaDesa = $desa->name;
            $data['desa'] = $namaDesa;
        }

        if ($request->file('picture_path_slip_setoran_sumbangan')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path_slip_setoran_sumbangan');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['picture_path_slip_setoran_sumbangan'] = $nama_file;
        }

        SumbanganPiki::create($data);
        return redirect('/sumbanganPiki')->with('success', 'Sumbangan Berhasil Dilakukan, Terima Kasih !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function show(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $id;
        if ($request->provinsi == 'Pilih Provinsi Anda') {
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data = $request->except(['_token', 'provinsi', 'kabupaten', 'kecamatan', 'desa']);
            $data['tanggal'] = date('Y-m-d');
            $data['jumlah'] = $rupiahHapusSimbolRp;

            if ($request->file('picture_path_slip_setoran_sumbangan')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_slip_setoran_sumbangan');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // dd($nama_file);

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $data['picture_path_slip_setoran_sumbangan'] = $nama_file;
            }

            SumbanganPiki::where('id', $id)->update($data);
            return redirect('/admin/pemasukanDonasiBaru')->with('success', 'Sumbangan Berhasil Diedit, Terima Kasih !');
        }

        $dataRupiah = $request->jumlah;
        $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
        $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
        $data = $request->except('_token');
        $data['jumlah'] = $rupiahHapusSimbolRp;
        $province = request()->input('provinsi');
        if ($province) {
            $province = Province::where('id', $province)->first();
            $namaProvince = $province->name;
            $data['provinsi'] = $namaProvince;
        }

        $regencies = request()->input('kota');
        if ($regencies) {
            $kota = Regency::where('id', $regencies)->first();
            $namaKota = $kota->name;
            $data['kabupaten'] = $namaKota;
        }

        $districts = request()->input('kecamatan');
        if ($districts) {
            $kecamatan = District::where('id', $districts)->first();
            $namaKecamatan = $kecamatan->name;
            $data['kecamatan'] = $namaKecamatan;
        }

        $villages = request()->input('desa');
        if ($villages) {
            $desa = Village::where('id', $villages)->first();
            $namaDesa = $desa->name;
            $data['desa'] = $namaDesa;
        }

        if ($request->file('picture_path_slip_setoran_sumbangan')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path_slip_setoran_sumbangan');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/slip/setoran/sumbangan/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['picture_path_slip_setoran_sumbangan'] = $nama_file;
        }

        SumbanganPiki::where('id', $id)->update($data);;
        return redirect('/admin/pemasukanDonasiBaru')->with('success', 'Sumbangan Berhasil Diedit, Terima Kasih !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumbanganPiki  $sumbanganPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumbanganPiki $sumbanganPiki)
    {
        //
    }

    public function pemasukanSumbanganViaBendahara($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = Pendapatan::find($id);
        return view('admin/pemasukanSumbanganViaBendahara', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
        ]);
    }

    public function postPemasukanSumbanganDiverifikasiBendahara(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = $request->validate([
                'jumlah' => 'required',
                'nama_penyetor' => 'required',
                'telp' => 'required',
                'tujuan_penyetor' => 'nullable',
                'berita' => 'nullable',
                'rekening_pembayaran' => 'required',
                'nomor_rekening' => 'required',
                'atas_nama' => 'required',
            ]);
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'diproses';
            $data['status_verifikasi_bendahara'] = 'terverifikasi';
            Pendapatan::where('id', $request->id)
            ->update($data);


            return redirect()->route('backend.sumbangan.baru')->with('success', 'Sumbangan telah diverifikasi bendahara');
        }
    }

    public function postPemasukanSumbanganDiverifikasiBendaharaViaForm(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = Pendapatan::find($request->id);
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pendapatan::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'diproses',
                    'status_verifikasi_bendahara' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.sumbangan.baru')->with('success', 'Sumbangan telah diverifikasi bendahara');
        }
    }

    public function pemasukanSumbanganViaKetua($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanSumbangan = Pendapatan::find($id);
        return view('admin/pemasukanSumbanganViaKetua', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $pemasukanSumbangan,
            'item' => $pemasukanSumbangan,
        ]);
    }

    public function postPemasukanSumbanganDiverifikasiKetua(Request $request)
    {
        $iuran = Pendapatan::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi') {
            $data = $request->validate([
                'jumlah' => 'required',
                'nama_penyetor' => 'required',
                'telp' => 'required',
                'tujuan_penyetor' => 'nullable',
                'berita' => 'nullable',
                'rekening_pembayaran' => 'required',
                'nomor_rekening' => 'required',
                'atas_nama' => 'required',
            ]);
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'diproses';
            $data['status_verifikasi_ketua'] = 'terverifikasi';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi Ketua');
        }
    }

    public function postPemasukanSumbanganDiverifikasiKetuaViaForm(Request $request)
    {
        $data = Pendapatan::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pendapatan::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'diproses',
                    'status_verifikasi_ketua' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi Ketua');
        }
    }

    public function pemasukanSumbanganViaSpi($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = Pendapatan::find($id);
        return view('admin/pemasukanSumbanganViaSpi', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
        ]);
    }

    public function postPemasukanSumbanganDiverifikasiSpi(Request $request)
    {
        // return $request;
        $iuran = Pendapatan::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi' && $iuran->status_verifikasi_ketua == 'terverifikasi') {
            $data = $request->validate([
                'jumlah' => 'required',
                'nama_penyetor' => 'required',
                'telp' => 'required',
                'tujuan_penyetor' => 'nullable',
                'berita' => 'nullable',
                'rekening_pembayaran' => 'required',
                'nomor_rekening' => 'required',
                'atas_nama' => 'required',
            ]);
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'terverifikasi';
            $data['status_verifikasi_spi'] = 'terverifikasi';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi SPI');
        }
    }

    public function postPemasukanSumbanganDiverifikasiSpiViaForm(Request $request)
    {
        $data = Pendapatan::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi' && $data->status_verifikasi_ketua == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            Pendapatan::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'terverifikasi',
                    'status_verifikasi_spi' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.sumbangan.diproses')->with('success', 'Sumbangan telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi SPI');
        }
    }

    public function postPemasukanSumbanganDitolak(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $data['status'] = 'ditolak';
        $data['alasan_ditolak'] = $request->alasan_ditolak . ' OLEH '. strtoupper(auth()->user()->name);
        $sumbangan = Pendapatan::find($request->id);
        if ($sumbangan->alasan_ditolak == null && auth()->user()->level=='bendahara') {
            $data['status_verifikasi_bendahara'] = 'ditolak';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_bendahara == null && $sumbangan->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_bendahara == null && auth()->user()->level=='super-admin') {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && auth()->user()->level=='super-admin') {
            $data['status_verifikasi_ketua'] = 'ditolak';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        elseif ($sumbangan->alasan_ditolak == null && auth()->user()->level=='spi') {
            $data['status_verifikasi_spi'] = 'ditolak';
            Pendapatan::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.sumbangan.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        else {
            return redirect()->route('backend.sumbangan.diproses')->with('unapproved', 'Sumbangan sudah pernah telah ditolak');
        }

    }

    public function postPemasukanSumbanganDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        Pendapatan::where('id', $request->id)
        ->update($data);
        $iuran = Pendapatan::find($request->id);
        $iuran->delete(); //softdeletes

        return redirect()->back()->with('success', 'Sumbangan telah dihapus');
    }

    #donasi#
    public function pemasukanDonasiViaBendahara($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = SumbanganPiki::find($id);
        $tujuan = SubMenuNavbarKeuangan::where('master_menu_navbars_id', 1)->get();
        return view('admin/pemasukanDonasiViaBendahara', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
            "tujuanSumbangan" => $tujuan,
        ]);
    }

    public function postPemasukanDonasiDiverifikasiBendahara(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.donasi.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.donasi.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = $request->validate([
                'jumlah' => 'required',
                'nama_penyetor' => 'required',
                'telp' => 'required',
                'tujuan_penyetor' => 'nullable',
                'berita' => 'nullable',
                'rekening_pembayaran' => 'required',
                'nomor_rekening' => 'required',
                'atas_nama' => 'required',
            ]);
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'diproses';
            $data['status_verifikasi_bendahara'] = 'terverifikasi';
            SumbanganPiki::where('id', $request->id)
            ->update($data);


            return redirect()->route('backend.donasi.baru')->with('success', 'Sumbangan telah diverifikasi bendahara');
        }
    }

    public function postPemasukanDonasiDiverifikasiBendaharaViaForm(Request $request)
    {
        if (auth()->user()->level=='super-admin') {
            return redirect()->route('backend.donasi.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='spi') {
            return redirect()->route('backend.donasi.baru')->with('unapproved', 'Sumbangan belum diverifikasi karna anda bukan bendahara');
        }
        if (auth()->user()->level=='bendahara') {
            $data = SumbanganPiki::find($request->id);
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            SumbanganPiki::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'diproses',
                    'status_verifikasi_bendahara' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.donasi.baru')->with('success', 'Sumbangan telah diverifikasi bendahara');
        }
    }

    public function pemasukanDonasiViaKetua($id)
    {
        $idUser = auth()->user()->id;
        $pemasukanSumbangan = SumbanganPiki::find($id);
        return view('admin/pemasukanDonasiViaKetua', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $pemasukanSumbangan,
            'item' => $pemasukanSumbangan,
        ]);
    }

    public function postPemasukanDonasiDiverifikasiKetua(Request $request)
    {
        $iuran = SumbanganPiki::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi') {
            $data = $request->validate([
                'jumlah' => 'required',
                'nama_penyetor' => 'required',
                'telp' => 'required',
                'tujuan_penyetor' => 'nullable',
                'berita' => 'nullable',
                'rekening_pembayaran' => 'required',
                'nomor_rekening' => 'required',
                'atas_nama' => 'required',
            ]);
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'diproses';
            $data['status_verifikasi_ketua'] = 'terverifikasi';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.donasi.diproses')->with('success', 'Sumbangan telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi Ketua');
        }
    }

    public function postPemasukanDonasiDiverifikasiKetuaViaForm(Request $request)
    {
        $data = SumbanganPiki::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            SumbanganPiki::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'diproses',
                    'status_verifikasi_ketua' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.donasi.diproses')->with('success', 'Sumbangan telah diverifikasi Ketua');
        }
        else {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi Ketua');
        }
    }

    public function pemasukanDonasiViaSpi($id)
    {
        $idUser = auth()->user()->id;
        $sumbangan = SumbanganPiki::find($id);
        return view('admin/pemasukanDonasiViaSpi', [
            "title" => "PIKI - Sangrid",
            "menu" => "Pemasukan Sumbangan Detail",
            "creator" => $idUser,
            'sumbangan' => $sumbangan,
            'item' => $sumbangan,
        ]);
    }

    public function postPemasukanDonasiDiverifikasiSpi(Request $request)
    {
        // return $request;
        $iuran = SumbanganPiki::find($request->id);
        if ($iuran->status_verifikasi_bendahara == 'terverifikasi' && $iuran->status_verifikasi_ketua == 'terverifikasi') {
            $data = $request->validate([
                'jumlah' => 'required',
                'nama_penyetor' => 'required',
                'telp' => 'required',
                'tujuan_penyetor' => 'nullable',
                'berita' => 'nullable',
                'rekening_pembayaran' => 'required',
                'nomor_rekening' => 'required',
                'atas_nama' => 'required',
            ]);
            $dataRupiah = $request->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            // return $rupiahHapusSimbolRp;
            $data['jumlah'] = $rupiahHapusSimbolRp;
            $data['status'] = 'terverifikasi';
            $data['status_verifikasi_spi'] = 'terverifikasi';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.donasi.diproses')->with('success', 'Sumbangan telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi SPI');
        }
    }

    public function postPemasukanDonasiDiverifikasiSpiViaForm(Request $request)
    {
        $data = SumbanganPiki::find($request->id);
        if ($data->status_verifikasi_bendahara == 'terverifikasi' && $data->status_verifikasi_ketua == 'terverifikasi') {
            $dataRupiah = $data->jumlah;
            $rupiahHapusTitik = str_replace(".", "", $dataRupiah);
            $rupiahHapusSimbolRp = str_replace("Rp ", "", $rupiahHapusTitik);
            SumbanganPiki::where('id', $request->id)
            ->update(
                [
                    'jumlah' => $rupiahHapusSimbolRp,
                    'status' => 'terverifikasi',
                    'status_verifikasi_spi' => 'terverifikasi',
                ]
            );

            return redirect()->route('backend.donasi.diproses')->with('success', 'Sumbangan telah diverifikasi SPI');
        }
        else {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan gagal diverifikasi SPI');
        }
    }

    public function postPemasukanDonasiDitolak(Request $request)
    {
        // return $request;
        $data = $request->except('_token');
        $data['status'] = 'ditolak';
        $data['alasan_ditolak'] = $request->alasan_ditolak . ' OLEH '. strtoupper(auth()->user()->name);
        $sumbangan = SumbanganPiki::find($request->id);
        if ($sumbangan->alasan_ditolak == null && auth()->user()->level=='bendahara') {
            $data['status_verifikasi_bendahara'] = 'ditolak';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.donasi.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_bendahara == null && $sumbangan->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_ketua == null && auth()->user()->level=='spi') {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && $sumbangan->status_verifikasi_bendahara == null && auth()->user()->level=='super-admin') {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan belum bisa ditolak karna belum di verifikasi bendahara');
        }
        elseif ($sumbangan->alasan_ditolak == null && auth()->user()->level=='super-admin') {
            $data['status_verifikasi_ketua'] = 'ditolak';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.donasi.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        elseif ($sumbangan->alasan_ditolak == null && auth()->user()->level=='spi') {
            $data['status_verifikasi_spi'] = 'ditolak';
            SumbanganPiki::where('id', $request->id)
            ->update($data);
            return redirect()->route('backend.donasi.ditolak')->with('success', 'Sumbangan telah ditolak');
        }
        else {
            return redirect()->route('backend.donasi.diproses')->with('unapproved', 'Sumbangan sudah pernah telah ditolak');
        }

    }

    public function postPemasukanDonasiDestroy(Request $request)
    {
        $data = ['deleted_by' => auth()->user()->name];
        SumbanganPiki::where('id', $request->id)
        ->update($data);
        $iuran = SumbanganPiki::find($request->id);
        $iuran->delete(); //softdeletes

        return redirect()->back()->with('success', 'Sumbangan telah dihapus');
    }
}
