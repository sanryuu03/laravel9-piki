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
      <h1 class="mb-3 text-center fs-1">{{ ucwords('berita ') }}{{ $category }}</h1>
  </div>
  <div class="container-xl">
              @foreach($sponsorshipNewsCategories->take(1) as $iklanKategoriBerita)
              <a href="{{ $iklanKategoriBerita->link_web }}">
                  <img src="{{ url('/storage/assets/sponsorshipnewscategories/'.$iklanKategoriBerita->picture_path) }}" class="mt-1 img-fluid" alt="...">
              </a>
              @endforeach
              @foreach($posts as $berita)
              <h1 class="mb-3 fs-6">
                  <a href="/berita/webView/{{ $berita->slug }}" class="read-more text-sky-400">
                      {{ $berita->judul_berita }}
                  </a>
              </h1>
              <hr class="mb-1">
              @endforeach
  </div>
  <a type="button" class="mb-1 btn btn-outline-primary" href="/categories/indonesia-flag">{{ ucwords('nasional') }}</a>
  <a type="button" class="mb-1 btn btn-outline-secondary" href="/categories/region">{{ ucwords('daerah') }}</a>
  <a type="button" class="mb-1 btn btn-outline-success" href="/categories/campus">{{ ucwords('kampus') }}</a>
  <a type="button" class="mb-1 btn btn-outline-danger" href="/categories/church">{{ ucwords('gereja') }}</a>
  <a type="button" class="mb-1 btn btn-outline-warning" href="/categories/economy">{{ ucwords('ekonomi') }}</a>
  <a type="button" class="mb-1 btn btn-outline-info" href="/categories/bendera-indonesia">{{ ucwords('politik') }}</a>
  <a type="button" class="mb-1 btn btn-outline-dark" href="/categories/computer">{{ ucwords('teknologi') }}</a>
  <a type="button" class="mb-1 btn btn-outline-dark" href="/categories/north-sumatra">{{ ucwords('budaya') }}</a>
  <!-- Kategory Berita PIKI Terbaru End-->
  @endsection
