  @extends('layouts.main')

  @section('menuContent')
  <style>
      .list-kategori-berita h1 {
          margin-top: 70px !important;
          padding-top: 15px !important;
          padding-bottom: 20px !important;
          margin-left: 0px !important;
          margin-right: 0px !important;
          text-align: center;
          font-weight: 400;
          font-size: 25px !important;
          width: 100% !important;
          /* background-color: #f7f7f7; */
          background-color: #61c7ff;
      }

  </style>

  <!-- Kategory Berita PIKI Terbaru Start-->
  <div class="p-0 container-fluid list-kategori-berita">
      <h1 class="mb-3 text-center fs-1">{{ ucwords('tentang') }}</h1>
  </div>
  <div class="container-xxl">
      <div class="row g-0">
          <div class="ms-5 me-5 col-sm-6 col-md-7">
              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      @foreach($backendTentang as $key => $tentang)
                      <button class="nav-link {{ $key == 0 ? 'active' : '' }} {{ $key % 2 == 0 ? 'text-dark' : 'text-info' }}" id="{{ 'nav-'.$key.'-tab' }}" data-bs-toggle="tab" data-bs-target="{{ '#nav-'.$key }}" type="button" role="tab" aria-controls="{{ 'nav-'.$key }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ ucwords($tentang->judul) }}</button>
                      @endforeach
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                  </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                  @foreach($backendTentang as $key => $tentang)
                  <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="{{ 'nav-'.$key }}" role="tabpanel" aria-labelledby="{{ 'nav-'.$key.'-tab' }}" tabindex="0">
                      {!! $tentang->keterangan !!}
                  </div>
                  @endforeach
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">genap</div>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                      {{ ucwords('dokumen') }}
                  </a>
                  @foreach($backendDokumen as $key => $dokumen)
                  <a href="{{ $dokumen->link_web }}" class="list-group-item list-group-item-action">{{ ucwords($dokumen->judul) }}</a>
                  @endforeach
              </div>
          </div>
      </div>

      {{-- <div class="row justify-content-center">
          <div class="col-md-10">
              @foreach($backendTentang as $tentang)
              <h1 class="mb-3 fs-6">
                  <a href="/berita/webView/{{ $tentang->slug }}" class="read-more text-sky-400">
      {{ $tentang->judul_berita }}
      </a>
      </h1>
      @endforeach
  </div>
  </div> --}}
  </div>
  <!-- Kategory Berita PIKI Terbaru End-->
  @endsection
