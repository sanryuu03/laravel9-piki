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

                                            <div class="col-md-4 mb-3">
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
                                </div>
                                <div class="mb-3">
                                    @if($action == 'print')
                                    <a class="btn btn-success" href="{{ route('anggota.export', $item->id) }}">Print</a>
                                    @elseif($action == 'edit')
                                    <button type="submit" class="btn btn-info">Update</button>
                                    @elseif($action == 'showPendaftarBaru')
                                    <a class="btn btn-danger" href="{{ route('pendaftarBaru') }}">Back</a>
                                    <a class="btn btn-primary" href="{{ route('process.pendaftarBaru.cv', $item->id) }}">process</a>
                                    <a class="btn btn-success" href="{{ route('approve.pendaftarBaru.cv', $item->id) }}">approve</a>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#showPendaftarBaruModal">tidak sesuai</button>
                                    @elseif($action == 'showProsesPendaftarBaru')
                                    <a class="btn btn-danger" href="{{ route('dalamProses') }}">Back</a>
                                    <a class="btn btn-success" href="{{ route('menu.dalam.proses.approve.pendaftarBaru.cv', $item->id) }}">approve</a>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#showProsesPendaftarBaruModal">tidak sesuai</button>
                                    @elseif($action == 'showUserTidakSesuai')
                                    <a class="btn btn-danger" href="{{ route('diTolak') }}">Back</a>
                                    @else
                                    <a class="btn btn-danger" href="{{ route('anggota.index') }}">Back</a>
                                    <a class="btn btn-primary" href="{{ route('process.pendaftarBaru.cv', $item->id) }}">process</a>
                                    <a class="btn btn-success" href="{{ route('approve.pendaftarBaru.cv', $item->id) }}">approve</a>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#showPendaftarBaruModal">tidak sesuai</button>
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

    <!-- Modal Alasan Start-->
    <div class="modal fade" id="showPendaftarBaruModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('diTolak.cv', $item->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="alasan_ditolak"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Send message</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Alasan End-->

    <!-- Modal Alasan Start-->
    <div class="modal fade" id="showProsesPendaftarBaruModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('menu.dalam.proses.diTolak.cv', $item->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="alasan_ditolak"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Send message</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Alasan End-->

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
