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
                <div class="mx-3 sidebar-brand-text">RuangAdmin</div>
            </a>
            <hr class="my-0 sidebar-divider">
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
                <a class="nav-link" href="{{  url('/admin/tambahAdmin') }}">
                    <i class="fas fa-fw fa-users-gear"></i>
                    <span>{{ ucwords('tambah admin') }}</span>
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
            <li class="nav-item">
                <a class="nav-link" href="{{  url('/admin/faq') }}">
                    <i class="fas fa-fw fa-circle-question"></i>
                    <span>FAQ</span>
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
                <nav class="mb-4 navbar navbar-expand navbar-light bg-navbar topbar static-top">
                    <button id="sidebarToggleTop" class="mr-3 btn btn-link rounded-circle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="ml-auto navbar-nav">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('img/boy.png') }}" style="max-width: 60px">
                                <span class="ml-2 text-white d-none d-lg-inline small">{{ auth()->user()->name }}</span>
                            </a>
                            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="mr-2 text-gray-400 fas fa-cogs fa-sm fa-fw"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="mr-2 text-gray-400 fas fa-list fa-sm fa-fw"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar Keuangan -->
                @if(request()->route()->getName() === 'backend.keuangan' || request()->route()->getName() === 'backend.pemasukan' || request()->route()->getName() === 'backend.data.iuran' || request()->route()->getName() === 'backend.data.biaya.iuran' || request()->route()->getName() === 'backend.iuran' || request()->route()->getName() === 'backend.iuran.baru' || request()->route()->getName() === 'backend.iuran.diproses' || request()->route()->getName() === 'backend.iuran.ditolak' || request()->route()->getName() === 'backend.iuran.diterima' || request()->route()->getName() === 'backend.sumbangan' || request()->route()->getName() === 'backend.sumbangan.baru' || request()->route()->getName() === 'backend.sumbangan.diproses' || request()->route()->getName() === 'backend.sumbangan.ditolak' || request()->route()->getName() === 'backend.sumbangan.diterima' || request()->route()->getName() === 'backend.rekap.pemasukan' || request()->route()->getName() === 'backend.pengeluaran.rutin' || request()->route()->getName() === 'backend.pengeluaran.rutin.baru' || request()->route()->getName() === 'backend.pengeluaran.rutin.diproses' || request()->route()->getName() === 'backend.pengeluaran.rutin.ditolak' || request()->route()->getName() === 'backend.pengeluaran.rutin.diterima' || request()->route()->getName() === 'backend.laporan.pengeluaran' || request()->route()->getName() === 'backend.pos.anggaran' || request()->route()->getName() === 'backend.nama.kegiatan' || request()->route()->getName() === 'backend.form.add.pengeluaran.rutin' || request()->route()->getName() === 'backend.pendapatan' || request()->route()->getName() === 'backend.master.menu.navbar.keuangan' || request()->route()->getName() === 'backend.sub.menu.navbar.keuangan' || request()->route()->getName() === 'backend.dinamis.form' || request()->route()->getName() === 'backend.dinamis.url.navbar.keuangan' || request()->route()->getName() === 'backend.dinamis.isi.menu.keuangan.baru' || request()->route()->getName() === 'backend.dinamis.isi.menu.keuangan.diproses' || request()->route()->getName() === 'backend.dinamis.isi.menu.keuangan.diterima' || request()->route()->getName() === 'backend.dinamis.isi.menu.keuangan.ditolak' || request()->route()->getName() === 'backend.donasi' || request()->route()->getName() === 'backend.donasi.detail' || request()->route()->getName() === 'backend.donasi.baru' || request()->route()->getName() === 'backend.donasi.diproses' || request()->route()->getName() === 'backend.donasi.ditolak' || request()->route()->getName() === 'backend.donasi.diterima')
                <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                    <div class="container">
                        <button class="order-1 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="order-3 collapse navbar-collapse" id="navbarCollapse">

                            <ul class="navbar-nav">
                                @if(auth()->user()->level=='super-admin' || auth()->user()->level=='bendahara' || auth()->user()->level=='spi')
                                @foreach($masterMenuNavbarKeuangan as $menuNavbarKeuangan)
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle {{ $menuNavbarKeuangan->id % 2 == 0 ? 'text-warning' : 'text-success' }}">{{ ucwords($menuNavbarKeuangan->nama_menu) }}</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="border-0 shadow dropdown-menu">
                                        @foreach($subMenuNavbarKeuangan as $item)
                                        @if($item->master_menu_navbars_id == $menuNavbarKeuangan->id)
                                        @if($item->id == 1)
                                        <li><a href="{{ url('/admin/pemasukanIuran') }}" class="dropdown-item">{{ ucwords($item->nama_sub_menu) }}</a></li>
                                        @elseif($item->id == 2)
                                        <li><a href="{{ url('/admin/pemasukanSumbangan') }}" class="dropdown-item">{{ ucwords($item->nama_sub_menu) }}</a></li>
                                        @elseif($item->id ==3)
                                        <li><a href="{{ url('/admin/pemasukanDonasi') }}" class="dropdown-item">{{ ucwords($item->nama_sub_menu) }}</a></li>
                                        @else
                                        <li><a href="{!! url('/admin/dinamisUrlNavbarKeuangan', [$item->masterMenuNavbarKeuangan->nama_menu, $item->nama_sub_menu]) !!}" class="dropdown-item">{{ ucwords($item->nama_sub_menu) }}</a></li>
                                        @endif
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                {{-- <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-success">Pemasukan</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="border-0 shadow dropdown-menu">
                                        <li><a href="{{ url('/admin/rekapPemasukan') }}" class="dropdown-item">Summary</a></li>
                                <li><a href="{{ url('/admin/pemasukanIuran') }}" class="dropdown-item">Iuran</a></li>
                                <li><a href="{{ url('/admin/pemasukanSumbangan') }}" class="dropdown-item">Sumbangan</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-warning">Pengeluaran</a>
                                <ul aria-labelledby="dropdownSubMenu1" class="border-0 shadow dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Summary</a></li>
                                    <li><a href="#" class="dropdown-item">Investasi</a></li>
                                    <li><a href="{{ route('backend.pengeluaran.rutin') }}" class="dropdown-item">Rutin</a></li>
                                    <li><a href="#" class="dropdown-item">Program</a></li>
                                </ul>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{  url('/admin/laporanKeuangan') }}" class="nav-link text-primary">Laporan Keuangan</a>
                            </li>
                            @endif

                            </ul>

                        </div>
                    </div>
                </nav>
                @endif

                <!-- Topbar Anggota -->
                @if($navbarAnggota == true)
                <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                    <div class="container">
                        <button class="order-1 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="order-3 collapse navbar-collapse" id="navbarCollapse">

                            <ul class="navbar-nav">
                                @if(auth()->user()->level=='super-admin' || auth()->user()->level=='bendahara' || auth()->user()->level=='spi')
                                {{-- <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-success">{{ ucwords('anggota') }}</a>
                                <ul aria-labelledby="dropdownSubMenu1" class="border-0 shadow dropdown-menu">
                                    <li><a href="{{ url('/admin/pendaftarBaru') }}" class="dropdown-item">{{ ucwords('anggota baru') }}</a></li>
                                    <li><a href="{{ url('/admin/dalamProses') }}" class="dropdown-item">{{ ucwords('anggota diproses') }}</a></li>
                                    <li><a href="{{ url('/admin/landingpageanggota') }}" class="dropdown-item">{{ ucwords('anggota diterima') }}</a></li>
                                    <li><a href="{{ url('/admin/diTolak') }}" class="dropdown-item">{{ ucwords('anggota ditolak') }}</a></li>
                                    <li><a href="{{ url('/admin/jabatanPIKISUMUT') }}" class="dropdown-item">{{ ucwords('jabatan anggota di PIKI SUMUT') }}</a></li>
                                </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-warning">{{ ucwords('kategori') }}</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="border-0 shadow dropdown-menu">
                                        <li><a href="{{ url('admin/kategorianggota') }}" class="dropdown-item">{{ ucwords('kategori anggota') }}</a></li>
                                        <li><a href="{{ url('admin/subkategorianggota') }}" class="dropdown-item">{{ ucwords('sub kategori anggota') }}</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{  url('/admin/pendaftarBaru') }}" class="nav-link text-primary">{{ ucwords('anggota baru') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{  url('/admin/dalamProses') }}" class="nav-link text-warning">{{ ucwords('anggota diproses') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{  url('/admin/landingpageanggota') }}" class="nav-link text-success">{{ ucwords('anggota diterima') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{  url('/admin/diTolak') }}" class="nav-link text-danger">{{ ucwords('anggota ditolak') }}</a>
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
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="my-auto text-center copyright">
                            {{-- <span>copyright &copy; <script>
                                    document.write(new Date().getFullYear());

                                </script> - developed by
                                <b><a href="https://itdevacademy.com/" target="_blank">IT Dev Academy</a></b>
                            </span> --}}
    <small><a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center rounded-0" href="https://itdevacademy.com/">© 2022 &nbsp;<span translate="no">{{ ucwords('ITDev academy') }}</span></a></small>
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
        <a class="rounded scroll-to-top" href="#page-top">
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
        <script src="{{ asset('js/mainPosAnggaran.js') }}"></script>
        <script src="{{ asset('js/mainPendapatan.js') }}"></script>
        <script src="{{ asset('js/mainCustomForm.js') }}"></script>
</body>

</html>
@else
{{-- {{ dd(auth()->user()->id) }} --}}
{{-- {{ dd($creator) }} --}}
<script>
    window.location = "{{ route('profile', $creator) }}";

</script>
@endif
