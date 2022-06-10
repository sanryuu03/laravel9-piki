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

        img {
            min-height: 50mm;
            min-width: 50mm;
        }

        .nama {
            margin-top: 80px;
        }

        .keahlian {
            min-height: 100mm;
        }

        @media print {

            html,
            body {
                width: 110mm;
                height: 387mm;
                size: A4;
            }

            /* ... the rest of the rules ... */
            .card {
                width: 260mm;
                max-height: 300mm;
                margin-left: -105px
            }

            .keahlian {
                max-height: 50mm;
                max-width: 155mm;
                margin-left: 5px

            }
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

                                    <form action="{{ route('anggota.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <img class="ml-5 rounded-circle" width="100px" height="100px" src="{{ url('/storage/app/'.$item->photo_profile) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="">
                                                    <input disabled class="form-control nama" type="name" name="name" value="{{ $item->name }}" placeholder="Nama" />
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
                                            <div class="col-md-8" min-height="1000px">
                                                <div class="mb-3" min-height="1000px">
                                                    {{-- <input min-height="1000px" disabled class="form-control keahlian" type="text" name="description_of_skills" value="{{ $item->description_of_skills }}" placeholder="Deskripsi Keahlian" /> --}}
                                                                          <div class="card card-body mt-3 isi-berita keahlian">
                          {{ $item->description_of_skills }}.
                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @if($action == 'print')
                                            <a class="btn btn-success" href="" onclick="window.print()">Print</a>
                                            @else
                                            <button type="submit" class="btn btn-info">Update</button>
                                            @endif
                                        </div>
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
    <script>
        let action = "{{ $action }}";
        let elems = document.querySelectorAll("input");
        let i = 0;
        console.log(action);
        console.log(`jumlah input ${elems.length}`);
        if (action == 'edit') {
            for (i = 0; i < elems.length; i++) {
                elems[i].removeAttribute('disabled');
                console.log('hapus disabled input');
            }
            document.getElementById('upload').type = 'file';
            console.log('type input dirubah');
        }

    </script>

</body>

</html>
