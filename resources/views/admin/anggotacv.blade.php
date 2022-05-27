<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

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
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ $menu }}</h1>
                                        <p class="text-gray-900">Selamat Datang</p>
                                    </div>
                                    @if(session('success'))
                                    <p class="alert alert-success">{{ session('success') }}</p>
                                    @endif
                                    @if($errors->any())
                                    @foreach($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                    @endif
                                    <form action="" method="POST">
                                        @foreach($user as $item)
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <img width="150px" src="{{ url('/storage/assets/anggota/profile/'.$item->picture_path) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="name" name="name" value="{{ $item->name }}" placeholder="Nama" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="phone_number" value="{{ $item->phone_number }}" placeholder="No Hp" />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="nik" value="{{ $item->nik }}" placeholder="NIK" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="email" value="{{ $item->email }}" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="address" value="{{ $item->address }}" placeholder="Alamat" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="province" value="{{ $item->province }}" placeholder="Provinsi" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="city" value="{{ $item->city }}" placeholder="Kabupaten/Kota" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="districts" value="{{ $item->districts }}" placeholder="Kecamatan" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="village" value="{{ $item->village }}" placeholder="Desa/Kelurahan" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="job" value="{{ $item->job }}" placeholder="Pekerjaan" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="description_of_skills" value="{{ $item->description_of_skills }}" placeholder="Deskripsi Keahlian" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <a class="btn btn-danger" href="{{ route('anggota.index') }}">Back</a>
                                            <a class="btn btn-success" href="{{ route('anggota.index') }}">Print</a>
                                        </div>
                                        @endforeach
                                    </form>
                                    <hr>

                                </div>
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
