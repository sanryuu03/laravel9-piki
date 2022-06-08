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

    public function login() {
        return view('admin/loginadmin', [
            "title" => "Admin PIKI",
            "creator" => "San"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request) {
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
        // return request()->input('desa');
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
        $data = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'nik' => 'required',
            'address' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'job' => 'required',
            'photo_ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'photo_profile' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'business_fields' => 'required',
            'description_of_skills' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

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
        // return $data;


        if($request->file('photo_ktp')){
            $data['photo_ktp'] = $request->file('photo_ktp')->store('assets/user/ktp');
        }

        if($request->file('photo_profile')){
            $data['photo_profile'] = $request->file('photo_profile')->store('assets/user/profile');
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
