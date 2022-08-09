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
      <h1 class="mb-3 text-center fs-3">News Category</h1>
      <div class="container-fluid">
          <div class="row">
              @foreach($categoryNews as $berita)
              <div class="mb-3 col-md-4">
                  <a href="/categories/{{ $berita->slug }}">
                      <div class="text-white card bg-dark">
                          @if($berita->picture_path_kategori_berita !== NULL)
                          <img src="{{ url('/storage/assets/categorynews/'.$berita->picture_path_kategori_berita) }}" class="card-img img-fluid" alt="{{ $berita->name }}" style="width:500px; height:395px;">
                          @else
                          <img src="https://source.unsplash.com/500x500?{{ $berita->slug }}" class="card-img" alt="{{ $berita->name }}">
                          @endif
                          <div class="p-0 card-img-overlay d-flex align-items-center">
                              <h5 class="p-4 text-center card-title flex-fill fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $berita->name }}</h5>
                          </div>
                      </div>
                  </a>
              </div>
              @endforeach
          </div>
      </div>
      <!-- Kategory Berita End-->

      <!-- Agenda-->
      <section class="h1-00 w-100 bg-tosca-1" style="box-sizing: border-box">
          <style>
              @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

              .content-3-2-agenda .btn:focus,
              .content-3-2-agenda .btn:active {
                  outline: none !important;
              }

              .content-3-2-agenda {
                  padding: 5rem 2rem;
              }

              .content-3-2-agenda .img-hero {
                  width: 100%;
                  margin-bottom: 3rem;
              }

              .content-3-2-agenda .right-column {
                  width: 100%;
              }

              .content-3-2-agenda .title-text {
                  font: 600 1.875rem/2.25rem Poppins, sans-serif;
                  margin-bottom: 2.5rem;
                  letter-spacing: -0.025em;
                  color: #121212;
              }

              .content-3-2-agenda .title-caption {
                  font: 500 1.5rem/2rem Poppins, sans-serif;
                  margin-bottom: 1.25rem;
                  color: #121212;
              }

              .content-3-2-agenda .circle {
                  font: 500 1.25rem/1.75rem Poppins, sans-serif;
                  height: 3rem;
                  width: 3rem;
                  margin-bottom: 1.25rem;
                  border-radius: 9999px;
                  background-color: #61c7ff;
              }

              .content-3-2-agenda .text-caption {
                  font: 400 1rem/1.75rem Poppins, sans-serif;
                  letter-spacing: 0.025em;
                  color: #565656;
              }

              .content-3-2-agenda .btn-learn-agenda {
                  font: 600 1rem/1.5rem Poppins, sans-serif;
                  padding: 1rem 2.5rem;
                  background-color: #0d8aff;
                  transition: 0.3s;
                  letter-spacing: 0.025em;
                  border-radius: 0.75rem;
              }

              .content-3-2-agenda .btn:hover {
                  background-color: #45dbb2;
                  transition: 0.3s;
              }

              @media (max-width: 480px) {
                  .title-text-h1 {
                      margin-bottom: -230px !important;
                      text-align: center !important;
                      font: 600 2.25rem/2.5rem Poppins, sans-serif;
                      margin-left: -330px !important;
                      min-width: 1024px !important;
                      margin-top: -50px !important;
                      padding-top: 40px !important;
                      padding-bottom: 10px !important;
                      /*background-color:rgba(0,0,0,0.7);*/
                      background-color: #f7f7f7;
                  }

                  .content-3-2-agenda .title-text {
                      font: 600 2.25rem/2.5rem Poppins, sans-serif;
                      background-color: #f7f7f7;
                      margin-left: 0px !important;
                      min-width: 1024px !important;
                  }

                  .content-3-2-agenda .w-px400 {
                      min-width: 412px !important;
                      margin-top: 150px !important;
                      margin-left: -43px !important;
                  }

                  .content-3-2-agenda .isi-berita {
                      margin-top: 0px !important;
                  }

                  .title-text-agenda-lainnya {
                      font-size: 30px !important;
                  }
              }

              @media (min-width: 768px) {
                  .content-3-2-agenda .title-text {
                      font: 200 2.25rem/2.5rem Poppins, sans-serif;
                  }

                  .title-text-h1 {
                      font-weight: 600;
                      margin-top: 0px !important;
                  }



                  .content-3-2-agenda .w-px400-desktop {
                      margin-top: -100px !important;
                      padding-top: -220px !important;
                      margin-left: -35px !important;
                  }

                  .content-3-2-agenda .title-text-agenda-lainnya {
                      margin-top: -100px !important;
                      margin-bottom: 30px !important;
                  }

                  .btn-learn-agenda {
                      margin-top: -10px !important;
                  }
              }

              @media (min-width: 992px) {
                  .content-3-2-agenda .img-hero {
                      width: 50%;
                      margin-bottom: 0;
                  }

                  .content-3-2-agenda .right-column {
                      width: 50%;
                  }

                  .content-3-2-agenda .circle {
                      margin-right: 1.25rem;
                      margin-bottom: 0;
                  }
              }

          </style>
          <h1 class="title-text-h1">Agenda</h1>
          <div class="content-3-2-agenda" style="font-family: 'Poppins', sans-serif">
              <div class="d-flex flex-lg-row flex-column">
                  <!-- Left Column -->
                  <div class="container-fluid d-flex w-px400 w-px400-desktop">
                      <div class="card-berita">
                          <div class="text-white card bg-dark">
                              <img src="{{ url('/storage/assets/agenda/'.$itemAgenda->picture_path) }}" class="flayer_agenda card-img" alt="..." style="width:100%;height: 400px;">
                          </div>
                          <div class="mt-3 card card-body isi-berita keterangan_agenda">
                              {!! $itemAgenda->keterangan_agenda !!}
                          </div>
                      </div>
                  </div>

                  <!-- Right Column -->
                  <div class="text-center right-column d-flex flex-column align-items-lg-start align-items-center text-sm-start">
                      <h6 class="title-text title-text-agenda-lainnya">Agenda Lainnya</h6>
                      <ul style="padding: 0; margin: 0">
                          <?php $no = 0;?>
                          @foreach($agenda as $item)
                          <?php $no++ ;?>
                          <li class="list-unstyled" style="margin-bottom: 1rem">
                              <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                                  <span class="text-white circle d-flex align-items-center justify-content-center">
                                      {{ $no }}
                                  </span>
                                  <a class='judul_agenda'>
                                      {{ $item->nama_agenda }}
                                  </a>
                              </h4>
                          </li>
                          @endforeach
                      </ul>
                      <a class="text-white btn btn-learn-agenda" href="/moreAgenda">Lihat lebih banyak agenda</a>
                  </div>
              </div>
          </div>
      </section>

      <!-- Anggota-->
      <section class="h1-00 w-100 bg-white-pucat" style="box-sizing: border-box">
          <style>
              @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

              .content-3-2-anggota .btn:focus,
              .content-3-2-anggota .btn:active {
                  outline: none !important;
              }

              .content-3-2-anggota {
                  padding: 5rem 2rem;
              }

              .content-3-2-anggota .img-hero {
                  width: 100%;
                  margin-bottom: 3rem;
              }

              .content-3-2-anggota .right-column {
                  width: 100%;
              }

              .content-3-2-anggota .title-text {
                  font: 600 1.875rem/2.25rem Poppins, sans-serif;
                  margin-bottom: 2.5rem;
                  letter-spacing: -0.025em;
                  color: #121212;
              }

              .content-3-2-anggota .title-caption {
                  font: 500 1.5rem/2rem Poppins, sans-serif;
                  margin-bottom: 1.25rem;
                  color: #121212;
              }

              .content-3-2-anggota .text-caption {
                  font: 400 1rem/1.75rem Poppins, sans-serif;
                  letter-spacing: 0.025em;
                  color: #565656;
              }

              @media only screen and (max-width: 480px) {
                  .content-3-2-anggota .title-text {
                      margin-top: -70px !important;
                      margin-bottom: 50px !important;
                      background-color: #f7f7f7;
                      margin-left: -350px !important;
                      min-width: 1024px !important;
                  }

                  .content-3-2-anggota .img-fluid {
                      width: 50%;
                      margin-left: 90px !important;

                  }

                  .content-3-2-anggota .left-column {
                      margin-top: -30px !important;
                      margin-left: -35px !important;
                      min-width: 400px !important;

                  }

                  .content-3-2-anggota .right-column {
                      margin-top: -50px !important;
                      margin-left: 0px !important;
                      min-width: 380px !important;

                  }
              }

              @media (min-width: 768px) {
                  .content-3-2-anggota {
                      margin-bottom: -70px !important;
                  }

                  .content-3-2-anggota .title-text {
                      font: 600 2.25rem/2.5rem Poppins, sans-serif;
                  }
              }

              @media (min-width: 992px) {
                  .content-3-2-anggota .img-hero {
                      width: 50%;
                      margin-bottom: 0;
                  }

                  .content-3-2-anggota .right-column {
                      width: 50%;
                  }
              }

          </style>
          <div class="mx-auto content-3-2-anggota container-xxl position-relative" style="font-family: 'Poppins', sans-serif">
              <h2 class="text-center title-text">Anggota</h2>
              <div class="d-flex flex-lg-row flex-column align-items-center">
                  <!-- Left Column -->
                  @if(count($anggota) != 0)
                  <div class="mx-auto text-center img-hero left-column d-flex justify-content-center">
                      <div class="container-fluid">
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
                  </div>

                  @else
                  <!-- Right Column -->
                  <div class="text-center right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start">
                      <ul style="padding: 0; margin: 0">
                          <div class="md:container md:mx-auto">
                              <div class="mb-3 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                      <div class="col-md-4">
                                          <img src="/images/avatar.png" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                          <div class="card-body">
                                              <h5 class="card-title">Prof Dr.xxx PhD</h5>
                                              <p class="card-text">Konsultan Pengembangan SDM.</p>
                                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="mb-3 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                      <div class="col-md-4">
                                          <img src="/images/avatar.png" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                          <div class="card-body">
                                              <h5 class="card-title">Prof Dr.xxx PhD</h5>
                                              <p class="card-text">Konsultan Pengembangan SDM.</p>
                                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="mb-3 card" style="max-width: 540px;">
                                  <div class="row g-0">
                                      <div class="col-md-4">
                                          <img src="/images/avatar.png" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                          <div class="card-body">
                                              <h5 class="card-title">Prof Dr.xxx PhD</h5>
                                              <p class="card-text">Konsultan Pengembangan SDM.</p>
                                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </ul>
                  </div>
                  @endif



              </div>
          </div>
      </section>
      <!-- Ruang Sponsor-->
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
