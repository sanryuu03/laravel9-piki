<?php

namespace App\Http\Controllers;

use App\Models\DynamicForm;
use App\Models\Pengeluaran;
use App\Models\JenisSetoran;
use Illuminate\Http\Request;
use App\Models\MasterMenuNavbar;
use App\Models\SubMenuNavbarKeuangan;

class DynamicFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $dynamic = DynamicForm::get();
        return view('admin/dynamicForm', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('tambah custom form PIKI SUMUT'),
            "creator" => $user,
            'summary' => 'ringkasan',
            'action' => 'add',
            'dynamic' => $dynamic,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DynamicForm $dynamicForm, SubMenuNavbarKeuangan $subMenuNavbarKeuangan)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        $jenisSetoran = JenisSetoran::get();
        return view('admin/formDynamicForm', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('tambah custom form PIKI SUMUT'),
            "creator" => $user,
            "namaUser" => $namaUser,
            'summary' => 'ringkasan',
            'dynamic' => $dynamicForm,
            'masterMenuNavbarKeuangan' => $masterMenuNavbarKeuangan,
            'subMenuNavbarKeuangan' => $subMenuNavbarKeuangan,
            'jenisSetoran' => $jenisSetoran,
            'action' => 'add',
        ]);
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
     * @param  \App\Models\DynamicForm  $dynamicForm
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicForm $dynamicForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicForm  $dynamicForm
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicForm $dynamicForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DynamicForm  $dynamicForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicForm $dynamicForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicForm  $dynamicForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicForm $dynamicForm)
    {
        //
    }

    public function customForm(Request $request)
    {
        $master_menu_navbar = $request->master_menu_navbars_id;
        // return request()->input('provinsi');
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::where('master_menu_navbars_id', $master_menu_navbar)->get();
        // return $subMenuNavbarKeuangan;
        $option = "<option>==Pilih Sub Menu==</option>";
        foreach($subMenuNavbarKeuangan as $subMenu){
            $option .= "<option value='$subMenu->id'>$subMenu->nama_sub_menu</option>";
        }
        echo $option;
    }

    public function saveCustomForm(Request $request)
    {
        // return $request;
        // return $request->action;
        $namaMenu = MasterMenuNavbar::where('id', $request->master_menu_navbars_id)->first();
        $namaSubMenu = SubMenuNavbarKeuangan::where('master_menu_navbars_id', $request->master_menu_navbars_id)->first();
        $jenisSetoran = JenisSetoran::where('id', $request->jenis_setorans_id)->first();
        // return $namaMenu;
        if ($request->action == "add") {
            $pesanError = [
                'nama_sub_menu' => 'wajib di isi',
                'jenis_setorans_id' => 'wajib di isi',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'master_menu_navbars_id' => 'required',
                'nama_sub_menu' => 'required',
                'jenis_setorans_id' => 'required',
                'post_by' => 'required',
            ], $pesanError);
            $data['nama_menu'] = $namaMenu->nama_menu;
            $data['nama_sub_menu'] = $namaSubMenu->nama_sub_menu;
            $data['jenis_setoran'] = $jenisSetoran->jenis_setoran;

            DynamicForm::create($data);
            return redirect()->route('backend.dinamis.form')->with('success', 'Sub Menu telah ditambahkan ke jenis setoran');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;
            $data = $request->except(['_token', 'action']);
            DynamicForm::where('id', $request->id)->update($data);
            return redirect()->route('backend.dinamis.form')->with('success', 'Sub Menu telah diedit');
        }
    }



    public function formPengeluaranDinamisViaBendahara($subMenu, $id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return $Pengeluaran = Pengeluaran::find($id);
        return view('admin/formPengeluaranDinamisViaBendahara', [
            "title" => "PIKI - Sangrid CRUD",
            'menu' => ucwords('form pengeluaran '.$subMenu. ' PIKI SUMUT'),
            "subemenu" => $subMenu,
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
