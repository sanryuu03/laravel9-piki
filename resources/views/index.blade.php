  @extends('layouts.main')

  @section('menuContent')
  <script>
      let agent = navigator.userAgent;
      let user_agent = navigator.userAgent.toLowerCase();
      window.addEventListener('load', function() {
          if (navigator != undefined && navigator.userAgent != undefined) {
              if (user_agent.indexOf('android') > -1) { // Is Android.
                  window.location = "{{ url('/mobile') }}";
              }
          }
      })

  </script>
  <div id="desktop">
      <!-- Header -->
      <section class="header">
          <header>
              <div class="text-center">
                  <img src="{{ url('/storage/assets/header/web/'.$header->picture_path) }}" alt="workly" class="" />
              </div>
          </header>
          <div class="container text-center">
              <div class="row content">
                  <div class="col-12">
                      <div class="button-header">

                          <button class="btn btn-listing" onClick="window.open('{{ route('register') }}','_blank')">Daftar</button>
                          <button class="btn btn-listing" onClick="window.open('{{ route('admin.login') }}','_blank')">Log in</button>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Program-->
      <div class="header-program">
          <h1 class="mb-3 text-center fs-1">{{ ucwords('program') }}</h1>
      </div>
      <section id="program" class="program bg-piki-1">
          <div class="owl-carousel">
              @foreach($program as $key => $item)
              <a href="{{ route('read.more.program', $item->slug) }}"><img src="{{ url('/storage/assets/program/'.$item->picture_path_program) }}" class="d-block w-100" alt="..."></a>
              @endforeach
          </div>
      </section>
      <!-- END: Program -->

      <!-- Berita Terbaru-->
      <div class="header-berita">
          <h1 class="mb-3 text-center fs-1">{{ ucwords('berita') }}</h1>
      </div>
      <div class="mt-5 container-xxl">
          <div class="row">
              <div class="col-8">
                  <div class="row g-0">
                  @foreach($news as $berita)
                      <div class="col-lg-6">
                          <img src="{{ url('/storage/assets/news/'.$berita->picture_path) }}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="mt-5 col-lg-5 ms-5 ">
                          <div class="card-body">
                          <a href="{{ route('read.more.berita', $berita->slug) }}" class="judul-berita text-decoration-none">{{ $berita->judul_berita }}</a>
                          <br>
                          <a href="{{ route('read.more.berita', $berita->slug) }}" class="text-secondary fs-6">{{ $berita->categoryNews->name }}</a>
                          <br>
                          <a class="text-secondary fs-6 text-decoration-none">{{ date('d-M-y H:i', strtotime($berita->created_at)) }} WIB</a>
                          </div>
                      </div>
                      <hr>
                  @endforeach
                  </div>
              </div>
              <div class="col-4">
                  <ul class="list-group">
                      <li class="list-group-item active" aria-current="true">{{ ucwords('berita lainnya') }}</li>
                      @foreach($beritaLainnya as $key => $lainnya)
                      <a href="{{ route('read.more.berita', $lainnya->slug) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                          {{ $lainnya->judul_berita }}
                      </a>
                      @endforeach
                      <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="/beritaLainnya">{{ ucwords('Lihat lebih banyak berita') }}</a>
                  </ul>
              </div>
          </div>
      </div>
      <!-- Berita End-->
      <!-- Kategory Berita Start-->
            <div class="header-berita">
          <h1 class="mb-3 text-center fs-1">{{ ucwords('News Category') }}</h1>
      </div>
      <div class="container-fluid">
          <div class="row">
              @foreach($categoryNews as $kategori)
              <div class="mb-3 col-md-4">
                  <a href="/categories/{{ $kategori->slug }}">
                      <div class="text-white card bg-dark">
                          <img src="{{ url('/storage/assets/categorynews/'.$kategori->picture_path_kategori_berita) }}" class="card-img img-fluid" alt="{{ $kategori->name }}" style="width:500px; height:395px;">
                          <div class="p-0 card-img-overlay d-flex align-items-center">
                              <h5 class="p-4 text-center card-title flex-fill fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $kategori->name }}</h5>
                          </div>
                      </div>
                  </a>
                  <ul class="list-group">
                      <li class="list-group-item bg-primary d-flex align-items-center justify-content-center" aria-current="true">{{ ucwords('berita sejenis') }}</li>
                      @foreach($beritaSejenis as $key => $sejenis)
                      @if($kategori->id == $sejenis->category_news_id)
                      <a href="{{ route('read.more.berita', $sejenis->slug) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                          {{ $sejenis->judul_berita }}
                      </a>
                      @endif
                      @endforeach
                  </ul>
              </div>
              @endforeach
          </div>
      </div>
      <!-- Kategory Berita End-->

      <!-- Agenda-->
                  <div class="header-berita">
          <h1 class="mb-3 text-center fs-1">{{ ucwords('agenda') }}</h1>
      </div>
      <section class="" style="">
          <div class="content-3-2-agenda" style="font-family: 'Poppins', sans-serif">
              <div class="d-flex flex-lg-row flex-column">
                  <!-- Left Column -->
                  <div class="container-xxl">
                      <div class="">
                          <div class="card bg-dark">
                              <img src="{{ url('/storage/assets/agenda/'.$itemAgenda->picture_path) }}" class="flayer_agenda card-img" alt="..." style="width:100%;height: 100%;">
                          </div>
                          <div class="mt-3 card card-body">
                              {!! $itemAgenda->keterangan_agenda !!}
                          </div>
                      </div>
                  </div>

                  <!-- Right Column -->
                  <div class="text-md-start">
                      <h6 class="text-center title-text">Agenda Lainnya</h6>
                      <ul style="padding: 0; margin: 0">
                          <?php $no = 0;?>
                          @foreach($agenda as $agendaku)
                          <?php $no++ ;?>
                          <li class="list-unstyled" style="margin-bottom: 1rem">
                              <h4 class="">
                                  <a class='judul_agenda text-decoration-none {{ $agendaku->id % 2 == 0 ? 'text-info' : 'text-secondary' }}'>
                                      {{ $agendaku->nama_agenda }}
                                  </a>
                              </h4>
                          </li>
                          @endforeach
                      </ul>
                      <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="/moreAgenda">Lihat lebih banyak agenda</a>
                  </div>
              </div>
          </div>
      </section>

      <!-- Anggota-->
    <div class="header-anggota">
          <h1 class="mb-3 text-center fs-1">{{ ucwords('anggota') }}</h1>
      </div>
      <section class="" style="">

          <div class="mx-auto content-3-2-anggota container-xxl" style="font-family: 'Poppins', sans-serif">
                  <!-- Left Column -->
                  <div class="mx-auto text-center img-hero left-column d-flex justify-content-center">
                      <div class="container-xxl">
                          @foreach($anggota as $item)
                          <div class="mb-3 card">
                              <div class="row g-0">
                                  <div class="col-md-3">
                                      @if($item->userPiki->photo_profile)
                                      <img src="{{ url('/storage/assets/user/profile/'.$item->userPiki->photo_profile) }}" class="img-fluid rounded-start" alt="...">
                                      @else
                                      <img src="/images/avatar.png" class="img-fluid rounded-start" alt="...">
                                      @endif
                                  </div>
                                  <div class="mt-4 col-md-8">
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
                  </div>
          </div>
      </section>
      <!-- Ruang Sponsor-->
          <div class="header-anggota">
          <h1 class="mb-3 text-center fs-1">{{ ucwords('Community Partners') }}</h1>
      </div>
      <section class="h1-00 w-100 bg-piki-3" style="box-sizing: border-box">
          <style>
              @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

              .content-sponsor .btn:focus,
              .content-sponsor .btn:active {
                  outline: none !important;
              }

              .content-sponsor {
                  padding: 5rem 2rem;
              }

              .content-sponsor .img-hero {
                  width: 100%;
                  margin-bottom: 3rem;
              }

              .content-sponsor .right-column {
                  width: 100%;
              }

              .content-sponsor .title-text {
                  font: 600 1.875rem/2.25rem Poppins, sans-serif;
                  margin-bottom: 2.5rem;
                  letter-spacing: -0.025em;
                  color: #121212;
              }

              .content-sponsor .title-caption {
                  font: 500 1.5rem/2rem Poppins, sans-serif;
                  margin-bottom: 1.25rem;
                  color: #121212;
              }

              .content-sponsor .circle {
                  font: 500 1.25rem/1.75rem Poppins, sans-serif;
                  height: 3rem;
                  width: 3rem;
                  margin-bottom: 1.25rem;
                  border-radius: 9999px;
                  background-color: #61c7ff;
              }

              .content-sponsor .text-caption {
                  font: 400 1rem/1.75rem Poppins, sans-serif;
                  letter-spacing: 0.025em;
                  color: #565656;
              }

              .content-sponsor .btn-learn-agenda {
                  font: 600 1rem/1.5rem Poppins, sans-serif;
                  padding: 1rem 2.5rem;
                  background-color: #0d8aff;
                  transition: 0.3s;
                  letter-spacing: 0.025em;
                  border-radius: 0.75rem;
              }

              .content-sponsor .btn:hover {
                  background-color: #45dbb2;
                  transition: 0.3s;
              }

              @media only screen and (max-width: 480px) {
                  .content-sponsor .title-text {
                      margin-top: -175px !important;
                      font: 600 1.875rem/2.25rem Poppins, sans-serif;
                      background-color: #f7f7f7;
                      margin-left: -350px !important;
                      min-width: 1024px !important;
                  }

                  .content-sponsor .left-column {
                      min-width: 410px !important;
                      margin-top: -40px !important;
                      margin-left: -1px !important;
                      margin-right: 0px !important;
                  }

                  .content-sponsor .right-column {
                      min-width: 410px !important;
                      margin-top: 0px !important;
                  }

                  .content-sponsor .isi-konten-sponsor {
                      margin-bottom: -500px !important;
                  }
              }

              @media (min-width: 768px) {
                  h2 {
                      margin-top: -70px !important;
                  }

                  .content-sponsor .title-text {
                      font: 600 2.25rem/2.5rem Poppins, sans-serif;
                  }

                  .content-sponsor .left-column {
                      width: 52%;
                      margin-left: -40px !important;
                  }

                  .content-sponsor .isi-konten-partner {
                      height: 350px;
                      width: 50%;
                      margin-left: -10px !important;
                  }
              }

              @media (min-width: 992px) {
                  .content-sponsor .right-column {
                      width: 100%;
                  }

                  .content-sponsor .circle {
                      margin-right: 1.25rem;
                      margin-bottom: 0;
                  }
              }

          </style>
          <div class="mx-auto content-sponsor container-xxl position-relative" style="font-family: 'Poppins', sans-serif">
              <h2 class="text-center title-text text-slate-500">Community Partners</h2>
              <div class="d-flex flex-lg-row flex-column align-items-center">
                  @foreach($sponsor as $item)

                  <!-- Left Column -->
                  <div class="text-center container-fluid left-column d-flex">
                      <div class="">
                          <div class="card bg-dark">
                              <img src="{{ url('/storage/assets/sponsor/'.$item->picture_path) }}" class="object-fill card-img" alt="...">
                          </div>
                      </div>
                  </div>

                  <!-- Right Column -->
                  <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start">
                      <ul style="padding: 0; margin: 0">
                          <div class="container-fluid">
                              <div class="card card-body d-lg-none isi-konten-sponsor">
                                  {!! str()->limit($item->konten_sponsor, 250) !!}.
                                  <br />
                                  <a href="#" class="read-more text-sky-400">Read More...</a>
                              </div>
                          </div>
                          <!-- tampilan web -->
                          <div class="container-fluid justify-content-center d-flex">
                              <div class="d-none d-sm-block d-block card card-body isi-konten-partner">
                                  {!! str()->limit($item->konten_sponsor, 1080) !!}.
                                  <br />
                                  <a href="" class="read-more text-sky-400">Read More...</a>
                              </div>
                          </div>
                      </ul>
                  </div>
                  @endforeach

              </div>
          </div>
      </section>

      <!-- Faq's-->
      <section class="faq-container" id="faq" class="collapse">
          <style>
              .faq-heading {
                  border-bottom: #777;
                  padding: 20px 60px;
              }

              .faq-container {
                  display: flex;
                  justify-content: center;
                  flex-direction: column;

              }

              .hr-line {
                  width: 60%;
                  margin: auto;
              }

              /* Style the buttons that are used to open and close the faq-page body */
              .faq-page {
                  /* background-color: #eee; */
                  color: #444;
                  cursor: pointer;
                  padding: 30px 20px;
                  width: 60%;
                  border: none;
                  outline: none;
                  transition: 0.4s;
                  margin: auto;

              }

              .faq-body {
                  margin: auto;
                  /* text-align: center; */
                  width: 50%;
                  padding: auto;

              }


              /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
              .active,
              .faq-page:hover {
                  background-color: #F9F9F9;
              }

              /* Style the faq-page panel. Note: hidden by default */
              .faq-body {
                  padding: 0 18px;
                  background-color: white;
                  display: none;
                  overflow: hidden;
              }

              .faq-page:after {
                  content: '\02795';
                  /* Unicode character for "plus" sign (+) */
                  font-size: 13px;
                  color: #777;
                  float: right;
                  margin-left: 5px;
              }

              .active:after {
                  content: "\2796";
                  /* Unicode character for "minus" sign (-) */
              }

              @media only screen and (max-width: 480px) {
                  .faq-card {
                      margin-top: 200px !important;
                  }

                  /* Style the faq-page panel. Note: hidden by default */

                  .faq-page {
                      margin-top: 30px !important;
                      width: 100% !important;

                  }

                  .faq-page.active:after {
                      /* Unicode character for "minus" sign (-) */
                      margin-bottom: 50px !important;
                  }

                  .faq-body {
                      margin-top: 0px !important;
                      padding-top: 0px !important;
                      width: 100% !important;
                  }
              }

          </style>
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
      <!-- End Faq's-->
  </div>

  @endsection
