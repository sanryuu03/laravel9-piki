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
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css" rel="stylesheet">

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>


</head>
@guest
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
@endguest
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Landing Page</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Landing Page</h6>
                        @if(auth()->user()->level=='super-admin')
                        <a class="collapse-item" href="{{  url('/admin/landingpageheader') }}">Header</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpageberita') }}">Berita</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpagejenisprogram') }}">Program</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpageagenda') }}">Agenda</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpageanggota') }}">Anggota</a>
                        <a class="collapse-item" href="{{  url('/admin/communitypartners') }}">Community Partners</a>
                        <a class="collapse-item" href="{{  url('/admin/keuangan') }}">Keuangan</a>
                        @endif

                        @if(auth()->user()->level=='admin')
                        <a class="collapse-item" href="{{  url('/admin/landingpageberita') }}">Berita</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpagejenisprogram') }}">Program</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpageagenda') }}">Agenda</a>
                        <a class="collapse-item" href="{{  url('/admin/communitypartners') }}">Community Partners</a>
                        @endif

                        @if(auth()->user()->level=='bendahara')
                        <a class="collapse-item" href="{{  url('/admin/landingpageagenda') }}">Agenda</a>
                        <a class="collapse-item" href="{{  url('/admin/keuangan') }}">Keuangan</a>
                        @endif

                        @if(auth()->user()->level=='organisasi')
                        <a class="collapse-item" href="{{  url('/admin/landingpagejenisprogram') }}">Program</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpageanggota') }}">Anggota</a>
                        @endif

                        @if(auth()->user()->level=='infokom')
                        <a class="collapse-item" href="{{  url('/admin/landingpageberita') }}">Berita</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpagejenisprogram') }}">Program</a>
                        <a class="collapse-item" href="{{  url('/admin/landingpageagenda') }}">Agenda</a>
                        @endif

                        @if(auth()->user()->level=='media')
                        <a class="collapse-item" href="{{  url('/admin/landingpageberita') }}">Berita</a>
                        @endif
                    </div>
                </div>
            </li>
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
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });

        </script>
        <!-- fecth api slug-->
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');
            if(title){
            title.addEventListener('change', function() {
                fetch('checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });
            }

        </script>
        <script>
            document.addEventListener("trix-file-accept", event => {
                event.preventDefault()
            });

        </script>
        <script>
            $(document).ready(function() {
                var table = $('#table_id').DataTable();

                $('.filter-province').on('change', function() {
                let provinsiFilter = $('#table-filter :selected').text();
                let search = this.value
                console.log(`filter provinsi ${provinsiFilter}`);
                console.log(`ini search ${search}`);
                console.log(`======================================`);
                table.search(provinsiFilter).draw();
                table.search("");
                });

                $('.filter-kota').on('change', function() {
                let kotaFilter = $('.filter-kota :selected').text();
                let search = this.value
                console.log(`filter Kab/Kota ${kotaFilter}`);
                console.log(`ini search ${search}`);
                console.log(`######################################`);
                table.search(kotaFilter).draw();
                table.search("");
                });
            });
        </script>
        <script>
        $(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $(function() {
                $('#table-filter').on('change', function() {
                    let id_provinsi = $('#table-filter :selected').val();
                    console.log(`ini provinsi id ${id_provinsi}`);
                    console.log(`======================================`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("cities") }}',
                        data: {id_provinsi: id_provinsi},
                        cache:false,
                        success: function(msg){
                            $('.filter-kota').html(msg);
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

        });
    </script>

        @endauth
</body>

</html>
