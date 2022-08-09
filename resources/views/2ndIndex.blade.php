<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PIKI - Mobile View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ asset('css/customStyleMobile.css') }}" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- navbar --}}
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
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index') }}#program" class="block text-white nav-link">Program</a>
                    </li>
                    <li class="nav-item">
                        <a href="#berita-lainnya" class="block text-white nav-link">Berita</a>
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
    <div class="mb-3 d-flex align-items-center container-fluid">
        <button type="button" class="btn btn-primary me-auto" onClick="window.open('{{ route('register') }}','_blank')">{{ ucwords('daftar') }}</button>
        <button type="button" class="btn btn-outline-primary" onClick="window.open('{{ route('admin.login') }}','_blank')">{{ ucwords('login') }}</button>
    </div>
    {{-- program --}}
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('Program') }}</h1>
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
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('berita terbaru') }}</h1>
    </div>
    @foreach($news as $berita)
    <div class="mt-2 card" style="width: 100% ">
        <img src="{{ url('/storage/assets/news/'.$berita->picture_path) }}" class="card-img-top" alt="..." style="width:100%;height: 100%;">
        <div class="card-body">
            <a href="{{ route('read.more.berita', $berita->slug) }}" class="text-decoration-none fs-3">{{ $berita->judul_berita }}</a>
            <br />
            <a href="{{ route('read.more.berita', $berita->slug) }}" class="text-secondary fs-6">{{ $berita->categoryNews->name }}</a>
            <p class="card-text fs-6">{{ date('d-M-y H:i', strtotime($berita->created_at)) }} WIB</p>
        </div>
    </div>
    @endforeach
    {{-- news category --}}
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('kategori berita') }}</h1>
    </div>
    <div id="carouselExampleIndicatorsNewsCategory" class="d-lg-none carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($categoryNews as $key => $berita)
            <div class="carousel-item {{ $key==0?'active':'' }}">
                <a href="/categories/{{ $berita->slug }}">
                    <div class="text-white card bg-dark">
                        <img src="{{ url('/storage/assets/categorynews/'.$berita->picture_path_kategori_berita) }}" class="card-img img-fluid" alt="{{ $berita->name }}" style="width:500px; height:395px;">
                        <div class="p-0 card-img-overlay d-flex align-items-center">
                            <h5 class="p-4 text-center card-title flex-fill fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $berita->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsNewsCategory" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsNewsCategory" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- berita lainnya --}}
    <div class="p-0 container-fluid header-program">
        <h1 id="berita-lainnya" class="mb-3 text-center fs-1">{{ ucwords('berita lainnya') }}</h1>
    </div>
    <div class="mt-2" style="font-family: 'Poppins', sans-serif">
        <div class="">
            <div class="">
                <?php $no = 0;?>
                @foreach($beritaLainnya as $key => $item)
                <?php $no++ ;?>
                <h4 class="list-group">
                    <a href="{{ route('read.more.berita', $item->slug) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                        {{ $item->judul_berita }}
                    </a>
                </h4>
                @endforeach
                <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="/beritaLainnya">{{ ucwords('Lihat lebih banyak berita') }}</a>
            </div>
        </div>
    </div>
    {{-- agenda --}}
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('agenda') }}</h1>
    </div>
    <div class="mt-2" style="font-family: 'Poppins', sans-serif">
        <div class="">
            <!-- Left Column -->
            <div class="">
                <div class="">
                    <div class="card" style="width: 100%;">
                        <img src="{{ url('/storage/assets/agenda/'.$agendaItem->picture_path) }}" class="p-0 flayer_agenda card-img" alt="..." style="width:100%;height: 100%;">
                    </div>
                    <div class="mt-1 card card-body keterangan_agenda">
                        {!! $agendaItem->keterangan_agenda !!}
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="">
                <div class="p-0 container-fluid header-program">
                    <h1 class="mb-3 text-center fs-1">{{ ucwords('agenda lainnya') }}</h1>
                </div>
                <?php $no = 0;?>
                @foreach($agenda as $key => $item)
                <?php $no++ ;?>
                <h4 class="list-group">
                    <a class='judul_agenda list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                        {{ $item->nama_agenda }}
                    </a>
                </h4>
                @endforeach
                <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="/moreAgenda">Lihat lebih banyak agenda</a>
            </div>
        </div>
    </div>
    {{-- anggota --}}
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('anggota') }}</h1>
    </div>
    <div class="">
        @foreach($anggota as $item)
        <div class="mb-1 card">
            <div class="row g-0">
                <div class="col-md-3 d-flex justify-content-center">
                    @if($item->userPiki->photo_profile)
                    <img src="{{ url('/storage/assets/user/profile/'.$item->userPiki->photo_profile) }}" class="img-fluid rounded-start" alt="...">
                    @else
                    <img src="/images/avatar.png" class="img-fluid rounded-start" alt="..." style="height: 200px; width:200px;">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <small class="text-muted">{{ $item->jabatan_piki_sumut }}</small>
                        <p class="card-text">{{ $item->job }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Community Partners --}}
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('Community Partners') }}</h1>
    </div>
    @foreach($sponsor as $item)

    <div class="card" style="width: 100%;">
        <img src="{{ url('/storage/assets/sponsor/'.$item->picture_path) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">{!! str()->limit($item->konten_sponsor, 250) !!}</p>
        </div>
        <div class="card-body">
            <a href="#" class="card-link">{{ ucwords('read more') }}</a>
        </div>
    </div>
    @endforeach
    {{-- faq --}}
    <div class="p-0 container-fluid header-program">
        <h1 class="mb-3 text-center fs-1">{{ ucwords('FAQ') }}</h1>
    </div>
      <section class="faq-container" id="faq" class="collapse">
      <div id="accordion">

          <div class="card faq-card">
              <div class="text-center card-header">
                  {{-- <a class="card-link" data-bs-toggle="collapse" href="#collapseOne">
                        FAQ's
                    </a> --}}
                  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseExample">
                      FAQ's
                  </a>
              </div>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordion">
              @foreach($backendFaq as $faq)
                  <div class="faq-one">
                      <!-- faq question -->
                      <h1 class="faq-page">
                      {{ ucwords($faq->pertanyaan) }} ?
                      </h1>

                      <!-- faq answer -->
                      <div class="faq-body">
                          <p>{{ ucwords($faq->jawaban) }}</p>
                      </div>
                  </div>
                  <hr class="hr-line">
              @endforeach
          </div>
      </div>

  </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/mainAgendaFrontEnd.js') }}"></script>
    <script src="{{ asset('js/mainFaq.js') }}"></script>
</body>
<footer id="footer">
    <small><a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center rounded-0" href="https://itdevacademy.com/">© 2022 &nbsp;<span translate="no">{{ ucwords('ITDev academy') }}</span></a></small>
</footer>
</html>
