  @extends('layouts.main')

  @section('menuContent')

  <!-- Header -->
  <section class="header">
      <style>
          @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap");

          * {
              font-family: "Montserrat", sans-serif !important;
          }

          body .header {
              background: #291586;
              background-size: contain;
              width: 100% !important;
              margin-bottom: -24px !important;
          }

          @media only screen and (max-width: 480px) {
              body .header {
                  background: #f7f7f7;
                  border-bottom: none !important;
                  border-style: hidden !important;
                  border: none !important;
                  outline: none !important;
                  border-collapse: collapse !important;
              }

              body .header .w-px400-desktop {
                  background-image: url("images/mobile-device-cover.jpg");
                  min-height: 100vh !important;
                  background-size: contain;
                  margin-top: 70px !important;
                  margin-bottom: -90px !important;
                  background-repeat: no-repeat;
                  border-bottom: none !important;
                  border-style: hidden !important;
                  border: none !important;
                  outline: none !important;
                  border-collapse: collapse !important;
              }

              body .header .content .button-header {
                  margin-top: -15px !important;
                  margin-bottom: -500px !important;
              }
          }

          @media only screen and (min-width: 768px) {
              body .header {
                  background: #291586;
                  width: 100% !important;
                  margin-bottom: -230px !important;
              }

              body .header nav {
                  padding-top: 30px;
                  padding-top: -50px !important;
              }

              body .header .w-px400-desktop {
                  background-image: url("images/pikiheader.jpg");
                  min-height: 100vh !important;
                  margin-bottom: 100px !important
              }


              body .header .content .button-header .btn-listing {
                  width: 150px;
                  height: 50px;
                  background: #0d8aff;
                  margin-top: -800px !important;
                  border-radius: 8px;
                  font-weight: normal;
                  font-size: 16px;
                  line-height: 21px;
                  color: #fff;
              }
          }

          body .header nav .nav-link {
              padding-top: 30px;
              margin-top: -50px !important;
          }

          body .header nav .navbar-brand {
              font-family: Montserrat;
              font-style: normal;
              font-weight: bold;
              font-size: 24px;
              line-height: 29px;
              color: #ffffff;
          }

          body .header nav .navigation li {
              margin-right: 16px;
          }

          body .header nav .navigation a {
              font-style: normal;
              font-weight: normal;
              font-size: 16px;
              line-height: 21px;
              color: #ffffff !important;
          }

          body .header nav .signup {
              width: 113px;
              background: #ffffff;
              margin-top: -30px !important;
              padding-top: 12px;
              padding-bottom: 12px;
              border-radius: 8px;
              font-style: normal;
              font-weight: normal;
              font-size: 16px;
              line-height: 21px;
              text-align: center;
              color: #08090d !important;
          }

          @media screen and (max-width: 768px) {
              body .header nav .signup {
                  width: 100% !important;
              }
          }

          body .header .content {
              padding-top: 90px;
          }

          body .header .content .headline {
              font-family: Montserrat !important;
              font-weight: bold;
              font-size: 55px;
              line-height: 67px;
              color: #ffffff;
          }

          body .header .content .subheadline {
              font-family: Montserrat !important;
              font-weight: 500;
              font-size: 16px;
              line-height: 28px;
              color: #ffffff;
          }

          body .header .content .button-header {
              margin-top: 50px;
              margin-bottom: -500px !important;
          }

          body .header .content .button-header .btn-listing {
              width: 150px;
              height: 50px;
              background: #0d8aff;
              margin-top: -400px;
              border-radius: 8px;
              font-weight: normal;
              font-size: 16px;
              line-height: 21px;
              color: #fff;
          }

          body .header .img-brand {
              padding-top: 50;
              padding-bottom: 90px;
          }

          body .header .container {
              margin-top: 40px !important;
              margin-bottom: -90px !important;
          }

          @media screen and (min-width: 768px) {
              body .header .img-brand {
                  padding-top: 100px;
              }
          }

          @media screen and (min-width: 768px) {
              body .header .img-brand .mr-60 {
                  margin-right: 60px;
              }
          }

      </style>
      <header>
          <div class="img-hero text-center justify-content-center d-flex">
              <img id="hero" class="header w-px400-desktop" src="" alt="" onClick="window.open('https://play.google.com/store/apps/details?id=id.pt.rpn.kede','_blank')">
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

  <!-- Berita Terbaru-->
  <section class="h-100 w-100" style="box-sizing: border-box">
      <style>
          @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

          .content-3-2 .btn:focus,
          .content-3-2 .btn:active {
              outline: none !important;
          }

          .content-3-2 {
              padding: 5rem 2rem;
          }

          .content-3-2 .img-hero {
              width: 100%;
              margin-bottom: 3rem;
          }

          .content-3-2 .right-column {
              width: 100%;
          }

          .content-3-2 .title-text {
              font: 600 1.875rem/2.25rem Poppins, sans-serif;
              margin-top: -2.5rem;
              margin-bottom: 2.5rem;
              letter-spacing: -0.025em;
          }

          .content-3-2 .title-caption {
              font: 500 1.5rem/2rem Poppins, sans-serif;
              margin-bottom: 1.25rem;
              color: #121212;
          }

          .content-3-2 .text-caption {
              font: 400 1rem/1.75rem Poppins, sans-serif;
              letter-spacing: 0.025em;
              color: #565656;
          }

          .content-3-2 .btn-learn {
              font: 600 1rem/1.5rem Poppins, sans-serif;
              padding: 1rem 2.5rem;
              background-color: #27c499;
              transition: 0.3s;
              letter-spacing: 0.025em;
              border-radius: 0.75rem;
          }

          .content-3-2 .btn:hover {
              background-color: #45dbb2;
              transition: 0.3s;
          }

          @media (max-width: 480px) {
              .content-3-2 {
                  margin-top: -350px !important;
                  padding-top: -550px !important;
                  padding-bottom: -70px !important;
              }

              .content-3-2 .title-text {
                  margin-top: 100px !important;
              }

              .content-3-2 .card-berita {
                  min-width: 380px !important;
                  margin-top: -30px !important;
              }

              .content-3-2 .isi-berita {
                  margin-top: -40px !important;
              }
          }

          @media (min-width: 768px) {
              .content-3-2 .title-text {
                  font: 600 2.25rem/2.5rem Poppins, sans-serif;
              }

              .content-3-2 .isi-berita {
                  min-height: 350px !important;
                  min-width: 550px !important;
              }
              .content-3-2 .card-berita {
                  margin-top: -30px !important;
                  min-height: 350px !important;
              }
          }

          @media (min-width: 992px) {
              .content-3-2 .img-hero {
                  width: 50%;
                  margin-bottom: 0;
              }

              .content-3-2 .right-column {
                  margin-left: 1rem;
                  margin-right: 0rem;
              }

              .content-3-2 .circle {
                  margin-right: 1.25rem;
                  margin-bottom: 0;
              }
              .content-3-2 .read-more {
                  bottom: 0px !important;
                  	left: 0px !important;
                      position: absolute;
              }
          }

      </style>
      @foreach($berita as $item)
      <div class="content-3-2 container-xxl mx-auto  position-relative" style="font-family: 'Poppins', sans-serif">
          <h2 class="title-text text-center text-slate-300">Berita Terbaru</h2>
          <div class="d-flex flex-lg-row flex-column align-items-center">
              <!-- Left Column -->
              <div class="img-hero justify-content-center d-flex">
                  <div class="card card-berita">
                      <img src="{{ url('/storage/assets/news/'.$item->picture_path) }}" class="card-img-top" alt="...">
                      <div class="card-body">
                          <p class="card-text text-muted">{{ $item->keterangan_foto }}.</p>
                      </div>
                  </div>
              </div>

              <!-- Right Column -->
              <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
                  <ul style="padding: 0; margin: 0">
                      <div class="card-berita">
                          <div class="card card-body mt-3 isi-berita">
                              {{ Str::limit($item->isi_berita, 1100) }}.
                          <a href="#" class="read-more text-sky-400">Read More...</a>
                          </div>
                      </div>
                  </ul>
              </div>
          </div>
      </div>
                  @endforeach

  </section>

  <!-- Program-->
  <section class="program bg-piki-white-pucat">
      <style>
          @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

          body {
              font-family: "Poppins", sans-serif;
          }

          .text-40 {
              font-size: 40px;
          }

          .text-28 {
              font-size: 28px;
          }

          .text-24 {
              font-size: 24px;
          }

          .text-20 {
              font-size: 20px;
          }

          @media only screen and (max-width: 480px) {
              h1 {
                  margin-top: -100px !important;
                  margin-bottom: -200px !important;
                  padding-bottom: 270px !important;
              }

              .isi-program {
                  margin-top: -550px !important;
                  padding-bottom: 50px !important;
                  visibility: hidden !important
              }

              .program {
                  padding-bottom: 50px !important;
              }

              .w-px400 {
                  min-width: 380px !important;
                  margin-left: -20px !important;
              }
          }

          @media (min-width: 768px) {
              .mt-px442 {
                  margin-top: 442px;
              }
          }

          .leading-px40 {
              line-height: 40px;
          }

          .leading-px36 {
              line-height: 36px;
          }

          .z-min100 {
              z-index: -100;
          }

          .z-min10 {
              z-index: -10;
          }

          .max-w-screen {
              max-width: 1440px;
          }

          .max-w-px400 {
              max-width: 400px;
          }

          .w-px580 {
              width: 580px;
          }

          .h-780 {
              height: 780px;
          }

      </style>
      <main class="relative z-30 px-4 pb-0 mx-auto md:pb-28 our-platform pt-3 max-w-screen-2xl lg:px-24">
          <div class="grid grid-cols-1 gap-4 md:grid-cols-12">
              <div class="md:col-span-10">
                  <h1 class="font-semibold leading-snug md:leading-9 text-40">
                      Program
                  </h1>
              </div>
          </div>
          <div id="myCarousel" class="grid grid-flow-col grid-rows-1 gap-4 mt-12 md:gap-10 md:mt-12 pb-12 isi-program">
              <div class="row-span-1">
                  <img src="/images/digital.jpeg" alt="workly" class="object-cover h-full rounded-lg md:rounded-xl w-px400" />
              </div>
              <div class="row-span-1">
                  <img src="/images/jurnal.jpeg" alt="workly" class="object-cover h-full rounded-lg md:rounded-xl w-px400" />
              </div>
              <div class="row-span-1">
                  <img src="images/hrd.jpeg" alt="workly" class="object-cover h-full rounded-lg md:rounded-xl w-px400" />
              </div>
          </div>
          <div id="carouselExampleControls" class="d-lg-none carousel slide w-px400" data-bs-ride="carousel">
              <div class="carousel-inner isi-program-carousel">
                  <div class="carousel-item active">
                      <img src="/images/digital.jpeg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                      <img src="/images/jurnal.jpeg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                      <img src="images/hrd.jpeg" class="d-block w-100" alt="...">
                  </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
      </main>
  </section>
  <!-- END: Program -->
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
              .content-3-2-agenda .title-text {
                  font: 600 2.25rem/2.5rem Poppins, sans-serif;
              }

              .content-3-2-agenda .w-px400 {
                  min-width: 412px !important;
                  margin-top: -120px !important;
                  margin-left: -43px !important;
              }

              .content-3-2-agenda .isi-berita {
                  margin-top: 0px !important;
              }
          }

          @media (min-width: 768px) {
              .content-3-2-agenda .title-text {
                  font: 600 2.25rem/2.5rem Poppins, sans-serif;
              }

              .content-3-2-agenda .w-px400-desktop {
                  margin-top: -100px !important;
                  padding-top: -220px !important;
                  margin-left: -43px !important;
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
      <div class="content-3-2-agenda container-xxl mx-auto  position-relative p-96" style="font-family: 'Poppins', sans-serif">
          <div class="d-flex flex-lg-row flex-column align-items-center">
              <!-- Left Column -->
              <div class="container-fluid d-flex w-px400 w-px400-desktop">
                  <div class="card-berita">
                      <div class="card bg-dark text-white">
                          <img src="/images/kede.jpeg" class="card-img object-fill" alt="...">
                      </div>
                      <div class="card card-body mt-3 isi-berita">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                      </div>
                  </div>
              </div>

              <!-- Right Column -->
              <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
                  <h2 class="title-text">Agenda Lainnya</h2>
                  <ul style="padding: 0; margin: 0">
                      <li class="list-unstyled" style="margin-bottom: 2rem">
                          <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                              <span class="circle text-white d-flex align-items-center justify-content-center">
                                  1
                              </span>
                              Trusted Mentor
                          </h4>
                      </li>
                      <li class="list-unstyled" style="margin-bottom: 2rem">
                          <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                              <span class="circle text-white d-flex align-items-center justify-content-center">
                                  2
                              </span>
                              Access Forever
                          </h4>
                      </li>
                      <li class="list-unstyled" style="margin-bottom: 4rem">
                          <h4 class="title-caption d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                              <span class="circle text-white d-flex align-items-center justify-content-center">
                                  3
                              </span>
                              Halfpenny
                          </h4>
                      </li>
                  </ul>
                  <button class="btn btn-learn-agenda text-white">Lihat lebih banyak agenda</button>
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

              }

              .content-3-2-anggota .img-fluid {
                  width: 50%;
                  margin-left: 90px !important;

              }

              .content-3-2-anggota .left-column {
                  margin-top: -30px !important;
                  margin-left: -5px !important;
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
      <div class="content-3-2-anggota container-xxl mx-auto  position-relative" style="font-family: 'Poppins', sans-serif">
          <h2 class="title-text text-center">Anggota</h2>
          <div class="d-flex flex-lg-row flex-column align-items-center">
              <!-- Left Column -->
              <div class="img-hero left-column text-center justify-content-center d-flex">
                  <div class="container-fluid">
                      <div class="card mb-3" style="max-width: 540px;">
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
                      <div class="card mb-3" style="max-width: 540px;">
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
                      <div class="card mb-3" style="max-width: 540px;">
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
              </div>

              <!-- Right Column -->
              <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
                  <ul style="padding: 0; margin: 0">
                      <div class="md:container md:mx-auto">
                          <div class="card mb-3" style="max-width: 540px;">
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
                          <div class="card mb-3" style="max-width: 540px;">
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
                          <div class="card mb-3" style="max-width: 540px;">
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
                  margin-top: -150px !important;
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

              .content-sponsor .isi-konten-sponsor {
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
      <div class="content-sponsor container-xxl mx-auto  position-relative" style="font-family: 'Poppins', sans-serif">
          <h2 class="title-text text-center text-slate-500">Community Partners</h2>
          <div class="d-flex flex-lg-row flex-column align-items-center">
              <!-- Left Column -->
              <div class="container-fluid left-column text-center d-flex">
                  <div class="">
                      <div class="card bg-dark">
                          <img src="/images/danau.jpg" class="card-img object-fill" alt="...">
                      </div>
                  </div>
              </div>

              <!-- Right Column -->
              <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
                  <ul style="padding: 0; margin: 0">
                      <div class="container-fluid text-center justify-content-center d-flex">
                          <div class="card card-body isi-konten-sponsor">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                          </div>
                      </div>
                  </ul>
              </div>
          </div>
      </div>
  </section>

  <!-- Faq's-->
  <section class="faq-container" id="faq" class="collapse">
      <style>
          .faq-container {
              display: -webkit-box;
              display: -ms-flexbox;
              display: flex;
              -webkit-box-pack: center;
              -ms-flex-pack: center;
              justify-content: center;
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
              -ms-flex-direction: column;
              flex-direction: column;
              background-color: #fff;
              margin-top: -50px;
              padding-top: 20px;
              padding-bottom: 10px;
              border-bottom: #777;
          }

          .faq-container .card-link {
              color: #bd5b24;
          }

          .hr-line {
              width: 80%;
              margin: auto;
          }

          /* Style the buttons that are used to open and close the faq-page body */
          .faq-page {
              /* background-color: #eee; */
              color: #444;
              cursor: pointer;
              padding: 30px 20px;
              width: 80%;
              -webkit-transition: 0.4s;
              transition: 0.4s;
              margin: auto;
              font-size: 17px;
          }

          .faq-body {
              margin: auto;
              /* text-align: center; */
              width: 50%;
              padding: auto;
          }

          /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
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

          .faq-page.active:after {
              content: "\2796";
              /* Unicode character for "minus" sign (-) */
          }

          @media only screen and (max-width: 480px) {
              /* Style the faq-page panel. Note: hidden by default */
              .faq-page {
                  margin-top: -30px !important;
              }

              .faq-page.active:after {
                  /* Unicode character for "minus" sign (-) */
                  margin-bottom: 100px !important;
              }

              .faq-body {
                  margin-top: -250px !important;
              }
          }

      </style>
      <div id="accordion">

          <div class="card">
              <div class="card-header text-center">
                  {{-- <a class="card-link" data-bs-toggle="collapse" href="#collapseOne">
                        FAQ's
                    </a> --}}
                  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseExample">
                      FAQ's
                  </a>
              </div>
              <div id="collapseOne" class="accordion-collapse collapse faq-card" data-bs-parent="#accordion">
                  <div class="faq-one">

                      <!-- faq question -->
                      <h1 class="faq-page">question 1 ?
                      </h1>

                      <!-- faq answer -->
                      <div class="faq-body">
                          <p>answer 1.</p>
                      </div>
                  </div>
                  <hr class="hr-line">

                  <div class="faq-two">

                      <!-- faq question -->
                      <h1 class="faq-page">question 2 ?
                      </h1>

                      <!-- faq answer -->

                      <div class="faq-body">
                          <p>answer 2.</p>
                      </div>
                  </div>
                  <hr class="hr-line">


                  <div class="faq-three">

                      <!-- faq question -->
                      <h1 class="faq-page">question 3 ?</h1>

                      <!-- faq answer -->
                      <div class="faq-body">
                          <p>answer 3.
                          </p>
                      </div>
                  </div>
                  <hr class="hr-line">
              </div>
          </div>
      </div>


  </section>
  <!-- End Faq's-->

  @endsection
