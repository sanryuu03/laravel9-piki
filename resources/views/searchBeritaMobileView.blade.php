  @extends('layouts.mainMobile')

  @section('menuContent')
<style>
.list-kategori-berita h1 {
    margin-top: 70px !important;
    padding-top: 15px !important;
    padding-bottom: 20px !important;
    margin-left: 0px !important;
    margin-right: 0px !important;
    text-align: center;
    font-weight:400;
    font-size: 25px !important;
    width: 100% !important;
    /* background-color: #f7f7f7; */
    background-color: #61c7ff;
}
</style>

  <!-- Kategory Berita PIKI Terbaru Start-->
  <div class="p-0 container-fluid list-kategori-berita">
      <h1 class="mb-3 text-center fs-1">{{ ucwords('pencarian '. '"'.$searchValues.'"') }}</h1>
  </div>
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-10">
              @foreach($searchBerita as $news)
              <h1 class="mb-3 fs-6">
              <a href="/berita/mobileView/{{ $key }}" class="read-more text-sky-400">
                  {{ $news }}
              </a>
              </h1>
              <hr class="mb-1">
              @endforeach
          </div>
      </div>
  </div>
  <!-- Kategory Berita PIKI Terbaru End-->
  @endsection
