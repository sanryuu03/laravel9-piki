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
            /*height: 100mm;*/
        }

    </style>
        {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
</head>
@auth
<body class="bg-gradient-primary hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 30px; height:30px">
                <span class="brand-text font-weight-bold">{{ $menu }}</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
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
                            <a href="{{  url('/admin/backendKeuanganViaUser', $userid) }}" class="nav-link">{{ ucwords('keuangan') }}</a>
                        </li>
                        @endcan
                    </ul>
            </div>
        </nav>
    </div>

    @yield('menuContentAnggota')
    @endauth


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('register/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('register/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('register/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/mainFormatRupiah.js') }}"></script>


</body>

</html>
