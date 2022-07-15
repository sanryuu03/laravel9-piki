<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        // return $provinces;
        return view('register/register', compact('provinces'));
    }

    public function login()
    {
        return view('admin/loginadmin', [
            "title" => "Admin PIKI",
            "creator" => "San"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            ['username.required' => 'The :attribute field wajib diisi.']
        );


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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
        // return request()->input('date');
        // $regencies = request()->input('kota');
        // if ($regencies) {
        //     $kota = Regency::where('id', $regencies)->first();
        //     $namaKota = $kota->name;
        //     $data['kota'] = $namaKota;
        // }
        // return $namaKota;
        // $data = $request->validate([
        //     'name' => 'required',
        //     'desa' => 'required',
        //     'password' => 'required',
        // ]);
        // $districts = request()->input('kecamatan');
        // if ($districts) {
        //     $kecamatan = District::where('id', $districts)->first();
        //     $namaKecamatan = $kecamatan->name;
        //     $data['district'] = $namaKecamatan;
        // }
        // User::create($data);

        // return $namaKecamatan;
        // $villages = request()->input('desa');
        // if ($villages) {
        //     $desa = Village::where('id', $villages)->first();
        //     $namaDesa = $desa->name;
        // }
        // return $namaDesa;
        // return request()->all();
        // return $request->file('photo_ktp')->store('storage/assets/user');
        $data = $request->validate(
            [
                'username' => 'required|max:255',
                'name' => 'required|max:255',
                'birthplace' => 'required',
                'date' => 'required',
                'gender' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email|unique:users',
                'nik' => 'required|numeric|digits:16|unique:users',
                'address' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'desa' => 'required',
                'pendidikan' => 'required',
                'sekolah' => 'nullable',
                'university' => 'nullable',
                'fakultas' => 'nullable',
                'jurusan' => 'nullable',
                'photo_ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'photo_profile' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'church' => 'required',
                'password' => 'required|min:5|max:255',
            ],
            [
                'nik.required' => 'NIK tidak boleh kosong.',
                'nik.digits' => 'NIK wajib 16 digit.',
            ]
        );

        $province = request()->input('provinsi');
        if ($province) {
            $province = Province::where('id', $province)->first();
            $namaProvince = $province->name;
            $data['province'] = $namaProvince;
        }

        $regencies = request()->input('kota');
        if ($regencies) {
            $kota = Regency::where('id', $regencies)->first();
            $namaKota = $kota->name;
            $data['city'] = $namaKota;
        }

        $districts = request()->input('kecamatan');
        if ($districts) {
            $kecamatan = District::where('id', $districts)->first();
            $namaKecamatan = $kecamatan->name;
            $data['district'] = $namaKecamatan;
        }

        $villages = request()->input('desa');
        if ($villages) {
            $desa = Village::where('id', $villages)->first();
            $namaDesa = $desa->name;
            $data['village'] = $namaDesa;
        }

        if (request()->input('pendidikan') === "Pilih-Pendidikan") {
            $data['pendidikan'] = "Tidak Kuliah";
            $data['university'] = NULL;
            $data['fakultas'] = NULL;
            $data['jurusan'] = NULL;
        }

        if (request()->input('pendidikan') === "Tidak-Kuliah") {
            $data['university'] = NULL;
            $data['fakultas'] = NULL;
            $data['jurusan'] = NULL;
        }

        // return $data;

        if ($request->file('photo_ktp')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_ktp');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/user/ktp/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['photo_ktp'] = $nama_file;
        }

        if ($request->file('photo_profile')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_profile');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // dd($nama_file);

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/user/profile/';

            // upload file
            $file->move($tujuan_upload, $nama_file);

            $data['photo_profile'] = $nama_file;
        }

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/login')->with('success', 'Registration successfull! Please login');
        // dd('registrasi berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
