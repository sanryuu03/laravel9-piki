<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/1c25dfe63a.js" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- DataTable -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ ucwords('PIKI-SUMUT') }}</a>
            <a class="navbar-brand" href="#">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 15.75C3.5 8.98451 8.98451 3.5 15.75 3.5H29.75C30.7165 3.5 31.5 4.2835 31.5 5.25C31.5 6.2165 30.7165 7 29.75 7H15.75C10.9175 7 7 10.9175 7 15.75V29.75C7 30.7165 6.2165 31.5 5.25 31.5C4.2835 31.5 3.5 30.7165 3.5 29.75V15.75Z" fill="#0EC8F8" />
                    <path d="M10.5 17.5C10.5 13.634 13.634 10.5 17.5 10.5H31.5C35.366 10.5 38.5 13.634 38.5 17.5V31.5C38.5 35.366 35.366 38.5 31.5 38.5H17.5C13.634 38.5 10.5 35.366 10.5 31.5V17.5Z" fill="#0EC8F8" />
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tentang/webView') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index') }}#program" class="block text-white nav-link">Program</a>
                    </li>
                    <li class="nav-item">
                        <a href="#berita" class="block text-white nav-link">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sumbangan.frontend') }}" class="block text-white nav-link">Donasi</a>
                    </li>
                </ul>
                <div><button type="button" class="btn btn-outline-dark" onClick="window.open('{{ route('register') }}','_blank')">{{ ucwords('Daftar/Login') }}</button></div>
            </div>
        </div>
    </nav>

    @yield('menuContent')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

    <script src="{{ asset('js/mainMobileCarousel.js') }}"></script>
    <script src="{{ asset('js/mainFaq.js') }}"></script>
    <script src="{{ asset('js/mainProvinsi.js') }}"></script>
    @stack('mainFormatRupiah')
    @stack('custom')
    <script src="{{ asset('js/mainAgendaFrontEnd.js') }}"></script>
    <script src="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/customOwl.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/mainArtikelLainnya.js') }}"></script>
</body>
<footer id="footer">
    <small><a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center rounded-0" href="https://itdevacademy.com/">© 2022 &nbsp;<span translate="no">{{ ucwords('ITDev academy') }}</span></a></small>
</footer>
</html>
