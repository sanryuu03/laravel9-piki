<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AnggotaPiki;
use App\Models\TambahAdmin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TambahAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        $izin = Permission::get();
        $users = User::permission($izin)->get();
        return view('admin/backendTambahAdmin', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('tambah admin'),
            "creator" => $idUser,
            "users" => $users,
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
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(TambahAdmin $tambahAdmin)
    {
        $anggota = AnggotaPiki::where('status_anggota', 'diterima')->get();
        $idUser = auth()->user()->id;
        // return $anggota->id ;
        // foreach($anggota as $a) {
        //     return $a->userPiki->id ;
        // }
        return view('admin/pilihAnggotaHakAkses', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('tambah admin'),
            "creator" => $idUser,
            "anggota" => $anggota,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(TambahAdmin $tambahAdmin, $id)
    {
        $user = auth()->user()->id;
        // return $id;
        $namaUser = auth()->user()->name;
        $userDiterima = AnggotaPiki::with('userPiki')->where('status_anggota', 'diterima')->where('users_id', $id)->first();
        // return $userDiterima;
        $izin = Permission::get();
        // return $izin;
        // return $izin[0]->name;
        // return count($izin);
        $users = User::permission($izin)->first();
        // return $users->Permissions;
        foreach ($izin as $punten) {
            $monggo[] = $punten->name;
        }
        // return $monggo;
        foreach ($users->permissions as $Permission) {
            $permisi[] = $Permission->name;
        }
        // return $permisi;
        return view('admin/formTambahAdmin', [
            "title" => "PIKI - Iuran",
            "menu" => ucwords("pilih roles"),
            "creator" => $user,
            'summary' => 'ringkasan',
            'userDiterima' => $userDiterima,
            'namaUser' => $namaUser,
            'users' => $users,
            'izin' => $monggo,
            'permisi' => $permisi,
            'action' => 'add',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TambahAdmin $tambahAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(TambahAdmin $tambahAdmin)
    {
        //
    }

    public function formTambahAdmin(TambahAdmin $tambahAdmin, $id)
    {
        $user = auth()->user()->id;
        // return $id;
        $namaUser = auth()->user()->name;
        $userDiterima = AnggotaPiki::with('userPiki')->where('status_anggota', 'diterima')->where('anggota_pikis.id', $id)->first();
        // return $userDiterima[0]->name;
        return view('admin/formTambahAdmin', [
            "title" => "PIKI - Iuran",
            "menu" => ucwords("pilih roles"),
            "creator" => $user,
            'summary' => 'ringkasan',
            'userDiterima' => $userDiterima,
            'namaUser' => $namaUser,
            'action' => 'add',
        ]);
    }

    public function saveTambahAdmin(Request $request)
    {
        // return $request;
        // return $request->action;
        $user = User::where('id', $request->users_id)->first();
        if ($request->action == "add") {
            // return $user;
            $data = $request->except('_token');
            $user->givePermissionTo($request->hakAkses);
            return redirect()->back()->with('success', 'permission telah di tambahkan !');
        }
        if ($request->action == "edit") {
        }
    }

    public function hapusTambahAdmin(Request $request)
    {
        // return $request;
        // return $request->id;
        // return $request->action;
        $izin = Permission::get();
        // $user = User::where('id', $request->users_id)->first();
        $user = User::where('id', $request->id)->permission($izin)->first();
        // return $user;
        $userIzin = User::permission($izin)->first();
        foreach ($user->permissions as $Permission) {
            $permisi[] = $Permission->name;
        }
        // return $permisi;
        $user->revokePermissionTo($permisi);
        return redirect()->back()->with('success', 'permission telah di hapus !');
    }
}
