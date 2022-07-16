@if(auth()->user()->level!='anggota')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
    <title>{{ $title }} - Dashboard</title>
    <link href="{{ asset('register/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('register/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('register/css/ruang-admin.min.css') }}" rel="stylesheet">
    <!-- DataTable -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">

    <style>
        .landingpage-anggota {
            overflow: auto;
            white-space: nowrap;
        }

    </style>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>


</head>
@auth
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{  url('/admin') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logo/logo.png') }}">
                </div>
                <div class="sidebar-brand-text mx-3">RuangAdmin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{  url('/admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>
            @if(auth()->user()->level=='super-admin')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageheader') }}">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Header</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageberita') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpagejenisprogram') }}">
                    <i class="fas fa-fw fa-microchip"></i>
                    <span>Program</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageagenda') }}">
                    <i class="fas fa-fw fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/backendanggota') }}">
                    <i class="fas fa-fw fa-user-gear"></i>
                    <span>Anggota</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/communitypartners') }}">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Community Partners</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/keuangan') }}">
                    <i class="fas fa-fw fa-money-bill-transfer"></i>
                    <span>Keuangan</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='admin')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpagejenisprogram') }}">
                    <i class="fas fa-fw fa-microchip"></i>
                    <span>Program</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageagenda') }}">
                    <i class="fas fa-fw fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/communitypartners') }}">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Community Partners</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='bendahara')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageagenda') }}">
                    <i class="fas fa-fw fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/keuangan') }}">
                    <i class="fas fa-fw fa-money-bill-transfer"></i>
                    <span>Keuangan</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='wakil-ketua')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageagenda') }}">
                    <i class="fas fa-fw fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='organisasi')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpagejenisprogram') }}">
                    <i class="fas fa-fw fa-microchip"></i>
                    <span>Program</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageagenda') }}">
                    <i class="fas fa-fw fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/backendanggota') }}">
                    <i class="fas fa-fw fa-user-gear"></i>
                    <span>Anggota</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='infokom')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageberita') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpagejenisprogram') }}">
                    <i class="fas fa-fw fa-microchip"></i>
                    <span>Program</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageagenda') }}">
                    <i class="fas fa-fw fa-calendar-days"></i>
                    <span>Agenda</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='media')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/landingpageberita') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->level=='spi')
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/keuangan') }}">
                    <i class="fas fa-fw fa-money-bill-transfer"></i>
                    <span>Keuangan</span>
                </a>
            </li>
            @endif

            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('img/boy.png') }}" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">{{ auth()->user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                @if(request()->route()->getName() === 'backend.keuangan' || request()->route()->getName() === 'backend.pemasukan' || request()->route()->getName() === 'backend.data.iuran' || request()->route()->getName() === 'backend.data.biaya.iuran' || request()->route()->getName() === 'backend.iuran' || request()->route()->getName() === 'backend.iuran.baru' || request()->route()->getName() === 'backend.iuran.diproses' || request()->route()->getName() === 'backend.iuran.ditolak' || request()->route()->getName() === 'backend.iuran.diterima' || request()->route()->getName() === 'backend.sumbangan' || request()->route()->getName() === 'backend.sumbangan.baru' || request()->route()->getName() === 'backend.sumbangan.diproses' || request()->route()->getName() === 'backend.sumbangan.ditolak' || request()->route()->getName() === 'backend.sumbangan.diterima' || request()->route()->getName() === 'backend.rekap.pemasukan' || request()->route()->getName() === 'backend.pengeluaran.rutin' || request()->route()->getName() === 'backend.pengeluaran.rutin.baru' || request()->route()->getName() === 'backend.pengeluaran.rutin.diproses' || request()->route()->getName() === 'backend.pengeluaran.rutin.ditolak' || request()->route()->getName() === 'backend.pengeluaran.rutin.diterima')
                <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                    <div class="container">
                        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                            <ul class="navbar-nav">
                                @if(auth()->user()->level=='super-admin' || auth()->user()->level=='bendahara' || auth()->user()->level=='spi')
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-success">Pemasukan</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                        <li><a href="{{ url('/admin/rekapPemasukan') }}" class="dropdown-item">Summary</a></li>
                                        <li><a href="{{ url('/admin/pemasukanIuran') }}" class="dropdown-item">Iuran</a></li>
                                        <li><a href="{{ url('/admin/pemasukanSumbangan') }}" class="dropdown-item">Sumbangan</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-warning">Pengeluaran</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">Summary</a></li>
                                        <li><a href="#" class="dropdown-item">Investasi</a></li>
                                        <li><a href="{{ route('backend.pengeluaran.rutin') }}" class="dropdown-item">Rutin</a></li>
                                        <li><a href="#" class="dropdown-item">Program</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{  url('/admin/laporanKeuangan') }}" class="nav-link text-primary">Laporan Keuangan</a>
                                </li>
                                @endif

                            </ul>

                        </div>
                    </div>
                </nav>
                @endif
                @yield('menuContent')



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

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>copyright &copy; <script>
                                    document.write(new Date().getFullYear());

                                </script> - developed by
                                <b><a href="https://itdevacademy.com/" target="_blank">IT Dev Academy</a></b>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>
        @else
        <style>
            .container {
                position: relative;
            }

            .center {
                position: absolute;
                margin-top: 250px;
                top: 50%;
                width: 100%;
                text-align: center;
                font-size: 18px;
            }

        </style>
        <div class="container">
            <a class="btn btn-primary center" href="{{ route('admin.login') }}">Login</a>
        </div>
        @endauth


        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ asset('register/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('register/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('register/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('register/js/ruang-admin.min.js') }}"></script>
        <!-- DataTable -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script src="{{ asset('js/mainTanggal.js') }}"></script>
</body>

</html>
@else
{{-- {{ dd(auth()->user()->id) }} --}}
{{-- {{ dd($creator) }} --}}
<script>
    window.location = "{{ route('profile', $creator) }}";

</script>
@endif
