<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIKI - Mobile View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ asset('css/customStyleMobile.css') }}" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
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
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index') }}#program" class="block text-white nav-link">Program</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori.berita') }}" class="block text-white nav-link">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sumbangan.frontend') }}" class="block text-white nav-link">Donasi</a>
                    </li>
                </ul>
                <div><button type="button" class="btn btn-outline-dark" onClick="window.open('{{ route('register') }}','_blank')">{{ ucwords('Daftar/Login') }}</button></div>
            </div>
        </div>
    </nav>
    {{-- header --}}
    <img src="{{ url('/storage/assets/header/mobile/'.$headerMobile->picture_path) }}" class="img-fluid header-mobile" alt="...">
    <div class="d-flex align-items-center container-fluid">
        <button type="button" class="btn btn-primary me-auto">{{ ucwords('daftar') }}</button>
        <button type="button" class="btn btn-outline-primary">{{ ucwords('login') }}</button>
    </div>
    {{-- program --}}
    <div class="container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">Program</h1>
    </div>
    <div id="carouselExampleIndicators" class="d-lg-none carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($program as $key => $item)
            <div class="carousel-item {{ $key==0?'active':'' }}">
                <a href="{{ route('read.more.program', $item->slug) }}"><img src="{{ url('/storage/assets/program/'.$item->picture_path_program) }}" class="d-block w-100" alt="..."></a>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- berita --}}
        <div class="container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">Berita</h1>
    </div>
      @foreach($news as $berita)

    <div class="mt-2 card" style="width: 100% ">
        <img src="{{ url('/storage/assets/news/'.$berita->picture_path) }}" class="card-img-top" alt="..." style="height: 100%;">
        <div class="card-body">
        <a href="{{ route('read.more.berita', $berita->slug) }}" class="">{{ $berita->judul_berita }}</a>
        <br/>
        <a href="{{ route('read.more.berita', $berita->slug) }}" class="text-secondary fs-6">{{ $berita->categoryNews->name }}</a>
            <p class="card-text">{{ date('d-M-y H:i', strtotime($berita->created_at)) }} WIB</p>
        </div>
    </div>
      @endforeach

</body>
<footer>
    <small>© 2022 <span translate="no">PIKI SUMUT</span></small>
</footer>
</html>
