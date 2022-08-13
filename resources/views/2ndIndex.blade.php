  @extends('layouts.mainMobile')

  @section('menuContent')
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
          <a href="{{ route('read.more.berita.mobile.view', $berita->slug) }}" class="text-decoration-none fs-3">{{ $berita->judul_berita }}</a>
          <br />
          <a href="{{ route('read.more.berita.mobile.view', $berita->slug) }}" class="text-secondary fs-6">{{ $berita->categoryNews->name }}</a>
          <p class="card-text fs-6">{{ date('d-M-y H:i', strtotime($berita->created_at)) }} WIB</p>
      </div>
  </div>
  @endforeach
  {{-- iklan itdev --}}
  @if(isset($partnerShip))
  <a href="{{ $partnerShip->link_web }}">
      <img src="{{ url('/storage/assets/partnership/'.$partnerShip->picture_path) }}" class="img-fluid" alt="..." style="width:100%;height: 100%;">
  </a>
  @else
  <a href="https://itdevacademy.com/">
      <img src="{{ asset('/images/hitmbiru.png') }}" class="img-fluid" alt="..." style="width:100%;height: 100%;">
  </a>
  @endif
  {{-- news category --}}
  <div class="p-0 container-fluid header-program">
      <h1 class="mb-3 text-center fs-1">{{ ucwords('kategori berita') }}</h1>
  </div>
  <div id="carouselExampleIndicatorsNewsCategory" class="d-lg-none carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
          @foreach($categoryNews as $key => $berita)
          <div class="carousel-item {{ $key==0?'active':'' }}">
              <a href="/categories/mobileView/{{ $berita->slug }}">
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
                  <a href="{{ route('read.more.berita.mobile.view', $item->slug) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                      {{ $item->judul_berita }}
                  </a>
              </h4>
              @endforeach
              <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="/beritaLainnya/mobileView">{{ ucwords('Lihat lebih banyak berita') }}</a>
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
          <div class="card text-bg-dark">
              @if($sponsorShipSatu->picture_path ?? '')
              <a href="{{ $sponsorShipSatu->link_web }}">
                  <img src="{{ url('/storage/assets/sponsorshipsatu/'.$sponsorShipSatu->picture_path) }}" class="card-img" alt="...">
              </a>
              @endif
          </div>
          <div class="mt-1 card text-bg-dark">
              @if($sponsorShipDua->picture_path ?? '')
              <a href="{{ $sponsorShipDua->link_web }}">
                  <img src="{{ url('/storage/assets/sponsorshipdua/'.$sponsorShipDua->picture_path) }}" class="card-img" alt="...">
              </a>
              @endif
          </div>
          <div class="mt-1 mb-1 card text-bg-dark">
              @if($sponsorShipTiga->picture_path ?? '')
              <a href="{{ $sponsorShipTiga->link_web }}">
                  <img src="{{ url('/storage/assets/sponsorshiptiga/'.$sponsorShipTiga->picture_path) }}" class="card-img" alt="...">
              </a>
              @endif
          </div>
      </div>
      @endforeach
  </div>
  {{-- Community Partners --}}
  <div class="p-0 container-fluid header-program">
      <h1 class="mb-3 text-center fs-1">{{ ucwords('artikel') }}</h1>
  </div>
  @foreach($sponsor as $item)

  <div class="card" style="width: 100%;">
      <img src="{{ url('/storage/assets/artikel/'.$item->picture_path) }}" class="card-img-top" alt="...">
      <div class="card-body">
          <a href="{{ route('read.more.artikel.web.view', $item->judul) }}" class="judul-berita text-decoration-none">{{ $item->judul }}</a>
          <br>
          <a class="text-secondary fs-6">{{ $item->penulis }}</a>
          <br>
          <a class="text-secondary fs-6 text-decoration-none">{{ date('d-M-y H:i', strtotime($berita->created_at)) }} WIB</a>
      </div>
  </div>
  @endforeach
  <ul class="list-group">
      <li class="list-group-item active" aria-current="true">{{ ucwords('artikel lainnya') }}</li>
      @foreach($sponsorLainnya as $key => $lainnya)
      <a href="{{ route('read.more.artikel.web.view', $item->judul) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
          {{ $lainnya->judul }}
      </a>
      @endforeach
      <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="{{ url('/artikel/Lainnya/webView/') }}">{{ ucwords('Lihat lebih banyak artikel') }}</a>
  </ul>
  <!-- sponsorship before faq start-->
  <div class="container text-center">
      @if($sponsorshipBeforeFaq->link_web_1 != '')
      <a href="{{ $sponsorshipBeforeFaq->link_web_1 }}">
          <img src="{{ url('/storage/assets/sponsorshipBeforeFaq/'.$sponsorshipBeforeFaq->iklan_1) }}" class="mt-1 img-fluid" alt="...">
      </a>
      @else
      <a href="https://itdevacademy.com/">
          <img src="{{ asset('/images/hitmbiru.png') }}" class="mt-1 img-fluid" alt="...">
      </a>
      @endif
      @if($sponsorshipBeforeFaq->link_web_2 != '')
      <a href="{{ $sponsorshipBeforeFaq->link_web_2 }}">
          <img src="{{ url('/storage/assets/sponsorshipBeforeFaq/'.$sponsorshipBeforeFaq->iklan_2) }}" class="mt-1 img-fluid" alt="...">
      </a>
      @else
      <a href="https://play.google.com/store/apps/details?id=id.pt.rpn.kede">
          <img src="/images/hehe.jpg" class="mt-1 img-fluid" alt="...">
      </a>
      @endif
      @if($sponsorshipBeforeFaq->link_web_3 != '')
      <a href="{{ $sponsorshipBeforeFaq->link_web_3 }}">
          <img src="{{ url('/storage/assets/sponsorshipBeforeFaq/'.$sponsorshipBeforeFaq->iklan_3) }}" class="mt-1 img-fluid" alt="...">
      </a>
      @else
      <a href="https://mitradesakmd.com/">
          <img src="/images/mitradesa.jpeg" class="mt-1 img-fluid" alt="...">
      </a>
      @endif
  </div>
  <!-- sponsorship before faq end-->
  {{-- faq --}}
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

  @endsection
