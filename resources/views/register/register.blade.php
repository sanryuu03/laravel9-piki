<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PIKI Register</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('register/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('register/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


    <style type="text/css">
        .bg-gradient-primary {
            background-image: linear-gradient(180deg, #4e73df -10%, #fff 100%);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.4);
        }

    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">PIKI Register</h1>
                                    <p class="text-gray-900">Selamat Datang</p>
                                </div>
                                @if($errors->any())
                                @foreach($errors->all() as $err)
                                <p class="alert alert-danger">{{ $err }}</p>
                                @endforeach
                                @endif
                                <form action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                    @csrf
                                    <div class="mb-3">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" placeholder="Username Untuk Login" value="{{ old('username') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" placeholder="Nama Lengkap Sesuai KTP" value="{{ old('name') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Tempat Lahir <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="birthplace" placeholder="Tempat Lahir Sesuai KTP" value="{{ old('birthplace') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input id="date" class="form-control" type="text" name="date" placeholder="YYYY/MM/DD" value="{{ old('date') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select id="gender" class="custom-select" name="gender">
                                            <option selected>Pilih Jenis Kelamin Anda</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nomor HP / WA <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="+6281234567890" value="{{ old('phone_number') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nik" placeholder="Masukkan NIK Anda" value="{{ old('nik') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Alamat Sesuai KTP <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address" placeholder="Masukkan Alamat Sesuai KTP" value="{{ old('address') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Provinsi <span class="text-danger">*</span></label>
                                        <select class="custom-select" name="provinsi" id="provinsi">
                                            <option selected>Pilih Provinsi Anda</option>
                                            @foreach ($provinces as $provinsi)
                                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Kabupaten / Kota <span class="text-danger">*</span></label>
                                        <select class="custom-select" name="kota" id="kota">
                                            <option selected>Pilih Kabupaten / Kota Anda</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select class="custom-select" name="kecamatan" id="kecamatan">
                                            <option selected>Pilih Kecamatan Anda</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Desa / Kelurahan <span class="text-danger">*</span></label>
                                        <select class="custom-select" name="desa" id="desa">
                                            <option selected>Pilih Desa / Kelurahan Anda</option>
                                        </select>
                                    </div>
                                    <div id="sekolah" class="mb-3">
                                        <label>Pendidikan SLTA (Optional)</label>
                                        <input class="form-control" type="text" name="sekolah" placeholder="Masukkan Nama SLTA/SMA/SMK Anda" value="{{ old('sekolah') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Perguruan Tinggi <span class="text-danger">*</span></label>
                                        <select id="pendidikan" class="custom-select" name="pendidikan">
                                            <option value="Pilih-Pendidikan" selected>Pilih pendidikan Terakhir Anda</option>
                                            {{-- <option value="Tidak-Kuliah">Tidak Kuliah</option> --}}
                                            <option value="Diploma">Diploma</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div id="university" class="mb-3 d-none">
                                        <label>Universitas <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="university" placeholder="Masukkan Nama Kampus Anda" value="{{ old('university') }}" />
                                    </div>
                                    <div id="fakultas" class="mb-3 d-none">
                                        <label>Fakultas <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="fakultas" placeholder="Masukkan Nama Fakultas Anda" value="{{ old('fakultas') }}" />
                                    </div>
                                    <div id="jurusan" class="mb-3 d-none">
                                        <label>Jurusan <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="jurusan" placeholder="Masukkan Nama  Jurusan Anda" value="{{ old('jurusan') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Pekerjaan (Optional)</label>
                                        <input class="form-control" type="text" name="job" placeholder="Masukkan Pekerjaan Anda" value="{{ old('job') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Foto KTP <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="photo_ktp" placeholder="Masukkan Photo KTP Anda" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Foto Profil <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="photo_profile" placeholder="Masukkan Photo Profile Anda" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Jemaat Gereja <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="church" placeholder="Masukkan Nama Gereja Anda" value="{{ old('church') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Bidang Usaha (Optional)</label>
                                        <input class="form-control" type="text" name="business_fields" placeholder="Masukkan Bidang Usaha Anda" value="{{ old('business_fields') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Deskripsi Keahlian (Optional)</label>
                                        <input class="form-control" type="text" name="description_of_skills" placeholder="Masukkan Kehalihan Anda" value="{{ old('description_of_skills') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password" placeholder="Isi Kata Sandi Minimal 5 Huruf" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Password Confirmation<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password_confirm" placeholder="Pastikan Kata Sandi Sama Dengan diatas" />
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary">Register</button>
                                        <a class="btn btn-danger" href="{{  url('/admin') }}">Back</a>
                                    </div>
                                        Sudah punya akun ? <a class="" href="{{  url('/admin') }}">Login !</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('register/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('register/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('register/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->

    <script>
        $(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $(function() {
                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();
                    console.log(`ini provinsi id ${id_provinsi}`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("cities") }}',
                        data: {id_provinsi: id_provinsi},
                        cache:false,
                        success: function(msg){
                            $('#kota').html(msg);
                            $('#kecamatan').html('<option>==Pilih Kabupaten==</option>');
                            $('#desa').html('<option>==Pilih Desa==</option>');
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

            $(function() {
                $('#kota').on('change', function() {
                    let id_kota = $('#kota').val();
                    console.log(`ini kota id ${id_kota}`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("districts") }}',
                        data: {id_kota},
                        cache:false,
                        success: function(msg){
                            $('#kecamatan').html(msg);
                            $('#desa').html('<option>==Pilih Desa==</option>');
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

            $(function() {
                $('#kecamatan').on('change', function() {
                    let id_kecamatan = $('#kecamatan').val();
                    console.log(`ini kecamatan id ${id_kecamatan}`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("villages") }}',
                        data: {id_kecamatan},
                        cache:false,
                        success: function(msg){
                            $('#desa').html(msg);
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

        });
    </script>

    <!-- Menambahakan Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]');
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			//format: 'mm/dd/yyyy',
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

<script>
	$(document).ready(function(){
                 $('#pendidikan').on('change', function() {
		            let pendidikan=$('#pendidikan').val();
		            let universitas=document.querySelector("#university");
		            let fakultas=document.querySelector("#fakultas");
		            let jurusan=document.querySelector("#jurusan");
                    console.log(`pendidikan ${pendidikan}`);
                    if(pendidikan === "Pilih-Pendidikan" ) {
                        universitas.classList.add("d-none");
                        fakultas.classList.add("d-none");
                        jurusan.classList.add("d-none");
                    } else if(pendidikan === "Tidak-Kuliah") {
                        universitas.classList.add("d-none");
                        fakultas.classList.add("d-none");
                        jurusan.classList.add("d-none");
                    } else {
                        universitas.classList.remove("d-none");
                        fakultas.classList.remove("d-none");
                        jurusan.classList.remove("d-none");
                    }
                });
	})
</script>

</body>

</html>
