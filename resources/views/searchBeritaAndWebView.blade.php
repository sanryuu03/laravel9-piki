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
      <h1 class="mb-3 text-center fs-1">{{ ucwords('pencarian '. $searchValues) }}</h1>
  </div>
  <div class="container-xxl">
      <div class="row g-0">
          <div class="ms-5 me-5 col-sm-6 col-md-7">
            @foreach($searchBerita as $key => $news)
              <h1 class="mb-3 fs-6">
              <a href="/berita/webView/{{ $news->slug }}" class="read-more text-sky-400">
                  {{ $news->judul_berita }}
              </a>
              </h1>
              @endforeach
          </div>
      </div>

  </div>
  <!-- Kategory Berita PIKI Terbaru End-->
  @endsection
