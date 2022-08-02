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
    <link href="{{ asset('backend/dist/css/adminlte.min.css') }}" rel="stylesheet">



    <style type="text/css">
        .bg-gradient-primary {
            background-image: linear-gradient(180deg, #4e73df -10%, #fff 100%);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .keahlian {
            /*height: 100mm;*/
        }

    </style>
</head>
@auth
<body class="bg-gradient-primary hold-transition layout-top-nav">
    <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{  url('/backendKMD') }}" class="navbar-brand">
                    <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-bold">{{ $menu }}</span>
                </a>
                <button class="order-1 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="order-3 collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{  url('/admin/profile', $userid) }}" class="nav-link">Home</a>
                        </li>
                        @if(auth()->user()->level=='anggota' && auth()->user()->status_anggota=='diterima')
                        <li class="nav-item">
                            <a href="{{  url('/admin/iuran', $userid) }}" class="nav-link">Iuran</a>
                        </li>
                        @endif
                        @can('header', $user)
                        <li class="nav-item">
                            <a href="{{  url('/admin/backendHeaderviaUser', $userid) }}" class="nav-link">{{ ucwords('header') }}</a>
                        </li>
                        @endcan
                        @can('berita', $user)
                        <li class="nav-item">
                            <a href="{{  url('/admin/backendBeritaviaUser', $userid) }}" class="nav-link">{{ ucwords('berita') }}</a>
                        </li>
                        @endcan
                        @can('program', $user)
                        <li class="nav-item">
                            <a href="{{  url('/admin/backendPagejenisprogramviaUser', $userid) }}" class="nav-link">{{ ucwords('program') }}</a>
                        </li>
                        @endcan
                        @can('agenda', $user)
                        <li class="nav-item">
                            <a href="{{  url('/admin/backendPageagendaviaUser', $userid) }}" class="nav-link">{{ ucwords('agenda') }}</a>
                        </li>
                        @endcan
                        @can('anggota', $user)
                        <li class="nav-item">
                            <a href="{{  url('/admin/backendAnggotaViaUser', $userid) }}" class="nav-link">{{ ucwords('anggota') }}</a>
                        </li>
                        @endcan
                        @can('community partners', $user)
                        <li class="nav-item">
                            <a href="{{  url('/admin/backendCommunitypartnersViaUser', $userid) }}" class="nav-link">{{ ucwords('community partners') }}</a>
                        </li>
                        @endcan
                        @can('keuangan', $user)
                        <li class="nav-item">
                            {{-- <a href="{{  url('/admin/backendKeuanganViaUser', $userid) }}" class="nav-link">{{ ucwords('keuangan') }}</a> --}}
                        <a href="{{  url('/admin/backendLaporanKeuanganViaUser', $userid) }}" class="nav-link">{{ ucwords('laporan keuangan') }}</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </nav>
</div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="my-5 border-0 shadow-lg card o-hidden">
                    <div class="p-0 card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="mb-4 text-gray-900 h4">{{ $menu }}</h1>
                                        <p class="text-gray-900">Selamat Datang</p>
                                    </div>
                                    @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    {{-- @if($errors->any())
                                    @foreach($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                    @endif --}}

                                    <form action="{{ route('anggota.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <img class="ml-5 rounded-circle" width="100px" height="100px" src="{{ url('storage/assets/user/profile/'.$item->photo_profile) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mt-5">
                                                    <input disabled class="form-control" type="name" name="name" value="{{ $item->name }}" placeholder="Nama" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="nik" value="{{ $item->nik }}" placeholder="NIK" />
                                                </div>
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
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="city" id="kota">
                                                        <option selected>Pilih Kabupaten / Kota Anda</option>
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="city" value="{{ $item->city }}" placeholder="Provinsi" />
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="district" id="kecamatan">
                                                        <option selected>Pilih Kecamatan Anda</option>
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="district" value="{{ $item->district }}" placeholder="Provinsi" />
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    @if($action == 'edit')
                                                    <select class="custom-select" name="village" id="desa">
                                                        <option selected>Pilih Desa / Kelurahan Anda</option>
                                                    </select>
                                                    @else
                                                    <input disabled class="form-control" type="text" name="district" value="{{ $item->village }}" placeholder="Provinsi" />
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="phone_number" value="{{ $item->phone_number }}" placeholder="No Hp" />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <img class="" width="550px" height="350px" src="{{ url('/storage/assets/user/ktp/'.$item->photo_ktp) }}">
                                                </div>
                                            </div>

                                            <input disabled class="form-control" type="text" name="address" value="{{ $item->address }}" placeholder="Alamat" />

                                            <div class="mb-3 col-md-4">
                                                <input disabled class="form-control" type="text" name="email" value="{{ $item->email }}" placeholder="Email" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <input disabled class="form-control" type="text" name="job" value="{{ $item->job }}" placeholder="Pekerjaan" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                @if($item->status_anggota == "diterima")
                                                <p class="font-weight-normal">Status Anggota: <span class="text-success font-weight-bolder text-uppercase">{{ $item->status_anggota }}</span></p>
                                                @else
                                                <p class="font-weight-normal">Status Anggota: <span class="text-danger font-weight-bolder text-uppercase">{{ $item->status_anggota }}</span></p>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    {{-- <input disabled class="form-control keahlian" type="text" name="description_of_skills" value="{{ $item->description_of_skills }}" placeholder="Deskripsi Keahlian" /> --}}
                                                    <textarea disabled class="form-control keahlian" id="exampleFormControlTextarea1" rows="10" name="description_of_skills">{{ $item->description_of_skills }}</textarea>
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
                                        <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
