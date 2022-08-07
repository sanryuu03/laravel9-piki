<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/tailwindcss" href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<style>
    @media only screen and (max-width: 480px) {

        html,
        body {
            max-width: 100vw;
            overflow-x: hidden;
            border-bottom: none !important;
            border-style: hidden !important;
            border: none !important;
            outline: none !important;
            border-collapse: collapse !important;
        }
    }

</style>
<body>
    <!-- Navbar -->
    <section class="w-full h-full px-8 py-3 transition-all duration-500 bg-blue-800 border-box linear lg:px-24 md:px-20 navbar navbar-fixed-top">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .navbar-1-1 .btn-fill {
                background-color: #0ec8f8;
                transition: 0.3s;
            }

            .navbar-1-1 .btn-fill:hover {
                background-color: #3ad8ff;
                transition: 0.3s;
            }

            .navbar-1-1 nav a.nav-link {
                color: #092a33;
                transition: 0.3s;
            }

            .navbar-1-1 nav a.nav-link:hover {
                color: #2c3b3f;
                font-weight: 500;
                transition: 0.3s;
            }

            .navbar-1-1 nav a.nav-link.active {
                color: #2c3b3f;
            }

            .navbar-1-1 #menu-toggle:checked+#menu,
            .navbar-1-1 #menu-toggle:checked+#menu+#menu {
                display: block;
            }

            @media only screen and (max-width: 480px) {

                .menu-burger {
                    margin-left: 220px !important;
                    margin-right: 0px !important;
                }

                .navbar-fixed-top {
                    height: fit-content;
                    margin-top: 0px !important;
                    position: fixed;
                    z-index: 50;
                }

            }

            @media only screen and (min-width: 992px) {
                .navbar {
                    position: fixed !important;
                    height: 3rem !important;
                    z-index: 40;
                }

                .navbar-1-1 {
                    position: fixed !important;
                    right: 0px;
                }

                .navbar-1-1 .logo-navbar {
                    position: fixed !important;
                    left: 0px;
                }

            }

        </style>
        <!-- dropdown 2-->
        <style>
            .dropbtn {
                background-color: #61C7ff;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {
                background-color: #ddd;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #9db6c4;
            }

            @media only screen and (max-width: 480px) {
                .dropdown-menu-mobile {
                    margin-top: -300px !important;
                    margin-left: 150px !important;
                }
            }

        </style>
        <div class="navbar-1-1" style="font-family: 'Poppins', sans-serif">
            <div class="container flex flex-row flex-wrap items-center justify-between mx-auto">
                <a href="" class="flex items-center font-medium logo-navbar">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 15.75C3.5 8.98451 8.98451 3.5 15.75 3.5H29.75C30.7165 3.5 31.5 4.2835 31.5 5.25C31.5 6.2165 30.7165 7 29.75 7H15.75C10.9175 7 7 10.9175 7 15.75V29.75C7 30.7165 6.2165 31.5 5.25 31.5C4.2835 31.5 3.5 30.7165 3.5 29.75V15.75Z" fill="#0EC8F8" />
                        <path d="M10.5 17.5C10.5 13.634 13.634 10.5 17.5 10.5H31.5C35.366 10.5 38.5 13.634 38.5 17.5V31.5C38.5 35.366 35.366 38.5 31.5 38.5H17.5C13.634 38.5 10.5 35.366 10.5 31.5V17.5Z" fill="#0EC8F8" />
                    </svg>
                </a>
                <label for="menu-toggle" class="block mx-auto cursor-pointer lg:hidden">
                    <svg class="w-6 h-6 menu-burger" fill="none" stroke="#092A33" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
                <input class="hidden" type="checkbox" id="menu-toggle" />
                <div class="flex-wrap items-center justify-center hidden w-full text-base lg:flex lg:items-center lg:w-auto lg:ml-auto lg:mr-auto" id="menu">
                    <nav class="items-center justify-between pt-8 space-x-0 space-y-6 text-base lg:space-x-12 lg:flex lg:pt-0 lg:space-y-0">
                        <a href="{{ route('index') }}" class="block font-medium text-white nav-link">Home</a>
                        <a class="text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang
                        </a>
                        <ul class="dropdown-menu dropdown-menu-mobile" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profil/Sejarah/Visi</a></li>
                            <li><a class="dropdown-item" href="#">Anggaran Dasar</a></li>
                            <li><a class="dropdown-item" href="#">Anggaran Rumah Tangga</a></li>
                            <li><a class="dropdown-item" href="#">Peraturan Organisasi</a></li>
                            <li><a class="dropdown-item" href="#">DPD Sumut</a></li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn">DPC Se-Sumut</button>
                                    <div class="dropdown-content">
                                        <a href="#">Link 1</a>
                                        <a href="#">Link 2</a>
                                        <a href="#">Link 3</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="{{ route('index') }}#program" class="block text-white nav-link">Program</a>
                        <a href="{{ route('kategori.berita') }}" class="block text-white nav-link">Berita</a>
                        <a href="{{ route('sumbangan.frontend') }}" class="block text-white nav-link">Donasi</a>
                    </nav>
                </div>

                <div class="hidden w-full lg:flex lg:items-center lg:w-auto" id="menu">
                    <button class="items-center py-1 mt-6 text-base font-medium text-white border-0 btn-fill px-7 focus:outline-none rounded-2xl lg:mt-0" onClick="window.open('{{ route('register') }}','_blank')">
                        Daftar/Login
                    </button>
                </div>
            </div>
        </div>
    </section>

    @yield('menuContent')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="{{ asset('js/mainMobileCarousel.js') }}"></script>
    <script src="{{ asset('js/mainFaq.js') }}"></script>
    <script src="{{ asset('js/mainProvinsi.js') }}"></script>
    @stack('mainFormatRupiah')
    <script src="{{ asset('js/mainAgendaFrontEnd.js') }}"></script>

    <script>
        $(document).ready(function () {
            // carousel ketika layar mobile
            let lebarPonsel = window.innerWidth;
            let myCarousel = document.getElementById('myCarousel')
            if (lebarPonsel <= 480) {
                $('#tes .isi-program').hide();
                accordionItems.forEach(item => {
                    item.addEventListener('click', (e) => {
                        setTimeout(function () {
                            let top = e.target.getBoundingClientRect().top + document.documentElement.scrollTop;
                            window.scroll({
                                top: top - 5
                                , behavior: 'smooth'
                            });
                        }, 200);
                    });
                });
            } else {
                $('#tes .isi-program').show();
            }
        });

    </script>
</body>
<footer>
  <small>© 2022 <span translate="no">PIKI SUMUT</span></small>
</footer>
</html>
