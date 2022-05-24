<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PIKI Register</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('register/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('register/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

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
                                <form action="{{ route('register.action') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" placeholder="Nama Lengkap Sesuai KTP" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Nomor HP / WA <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="+6281234567890" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" placeholder="Masukkan Email Anda" />
                                    </div>
                                    <div class="mb-3">
                                        <label>NIK <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="Masukkan NIK Anda" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Alamat Sesuai KTP <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address" placeholder="Masukkan Alamat Sesuai KTP" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Provinsi <span class="text-danger">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Pilih Provinsi Anda</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Kabupaten / Kota <span class="text-danger">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Pilih Kabupaten / Kota Anda</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Pilih Kecamatan Anda</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Desa / Kelurahan <span class="text-danger">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Pilih Desa / Kelurahan Anda</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Pekerjaan <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="job" placeholder="Masukkan Pekerjaan Anda" />
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
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password" placeholder="Isi Kata Sandi" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Password Confirmation<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password_confirm" placeholder="Pastikan Kata Sandi Sama Dengan diatas" />
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary">Register</button>
                                        <a class="btn btn-danger" href="{{  url('/admin') }}">Back</a>
                                    </div>
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
    <script src="{{ asset('register/js/ruang-admin.min.js') }}"></script>

</body>

</html>
