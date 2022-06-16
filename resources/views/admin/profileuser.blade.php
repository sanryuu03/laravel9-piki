<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .keahlian {
            height: 100mm;
        }

    </style>
</head>
@auth
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

                                    <form action="{{ route('anggota.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <img class="ml-5 rounded-circle" width="100px" height="100px" src="{{ url('/storage/'.$item->photo_profile) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="">
                                                    <input disabled class="form-control" type="name" name="name" value="{{ $item->name }}" placeholder="Nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-n5">
                                                <div class="mb-3">
                                                    <input id="upload" disabled type="hidden" name="picture_path" class="form-control" value="{{ asset('/storage/assets/anggota/profile'.$item->photo_profile) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-n5">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="nik" value="{{ $item->nik }}" placeholder="NIK" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="phone_number" value="{{ $item->phone_number }}" placeholder="No Hp" />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="address" value="{{ $item->address }}" placeholder="Alamat" />
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <input disabled class="form-control" type="text" name="email" value="{{ $item->email }}" placeholder="Email" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="province" id="provinsi">
                                                        <option selected>Pilih Provinsi Anda</option>
                                                        @foreach ($provinces as $provinsi)
                                                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="province" value="{{ $item->province }}" placeholder="Provinsi" />
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="city" id="kota">
                                                        <option selected>Pilih Kabupaten / Kota Anda</option>
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="city" value="{{ $item->city }}" placeholder="Provinsi" />
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="district" id="kecamatan">
                                                        <option selected>Pilih Kecamatan Anda</option>
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="district" value="{{ $item->district }}" placeholder="Provinsi" />
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="village" id="desa">
                                                        <option selected>Pilih Desa / Kelurahan Anda</option>
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="district" value="{{ $item->village }}" placeholder="Provinsi" />
                                                    @endif
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
                                                <img class="ml-5 rounded-circle" width="100px" height="100px" src="{{ url('/storage/'.$item->photo_ktp) }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    {{-- <input disabled class="form-control keahlian" type="text" name="description_of_skills" value="{{ $item->description_of_skills }}" placeholder="Deskripsi Keahlian" /> --}}
                                                    <textarea disabled class="form-control keahlian" id="exampleFormControlTextarea1" rows="25" name="description_of_skills">{{ $item->description_of_skills }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @if($action == 'view')
                                            <a class="btn btn-warning" href="{{ route('profile.edit', $item->id) }}">Edit</a>
                                            @endif
                                        </div>
                                    </form>
                                    <hr>
                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
        @endauth


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('register/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('register/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('register/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script>
        let action = "{{ $action }}";
        let elems = document.querySelectorAll("input");
        let textarea = document.querySelector(".keahlian");
        let i = 0;
        console.log(action);
        console.log(`jumlah input ${elems.length}`);
        if (action == 'edit') {
            for (i = 0; i < elems.length; i++) {
                elems[i].removeAttribute('disabled');
                console.log('hapus disabled input');
            }
            textarea.removeAttribute('disabled');
            document.getElementById('upload').type = 'file';
            console.log('type input dirubah');
        }
    </script>

</body>

</html>