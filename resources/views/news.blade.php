  @extends('layouts.main')

  @section('menuContent')


  <!-- Berita Start-->
  <style>
      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }

          p {
              margin-bottom: 20px !important;
          }

          button {
              color: blue !important;
              margin-top: 25px;
              margin-bottom: 25px;
          }
      }


      @media (min-width: 992px) {
          img {
              width: 1200px;
              height: 400px;
          }

          p {
              margin-bottom: 20px !important;
          }

          button {
              color: blue !important;
              margin-top: 25px;
              margin-bottom: 5px;
          }
      }

  </style>
  <div class="container-fluid pt-5">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <h1 class="fs-1">
                  {{ $news->judul_berita }}
              </h1>
              <p>
                  {{ $news->created_at }}
                  <a class="text-sky-600" href="{{ route('isi.kategori', $news->categoryNews->slug) }}">{{ $news->categoryNews->name }}</a>
              </p>
              <img src="{{ url('/storage/assets/news/'.$news->picture_path) }}" class="img-fluid" alt="">

              <p class="card-text"><small class="text-muted">{!! $news->keterangan_foto !!}</small></p>
              <article>
              {!! $news->isi_berita !!}
              </article>

              <button type="button" class="btn btn-danger" href="{{ route('kategori.berita') }}">Back to News</button>
          </div>
      </div>
  </div>

  <!-- Berita End-->



  @endsection
