  @extends('layouts.main')

  @section('menuContent')


  <!-- Kategory Berita PIKI Terbaru Start-->
  <div class="container-fluid pt-5">
      <div class="row justify-content-center">
          <h1>News Category: {{ $category }}</h1>
          <div class="col-md-10">
              @foreach($posts as $berita)
              <h1 class="fs-1">
                  {{ $berita->judul_berita }}
              </h1>
              <p>
                  {{ $berita->created_at }}
                  <a class="text-sky-600" href="{{ route('isi.kategori', $berita->categoryNews->slug) }}">{{ $berita->categoryNews->name }}</a>
              </p>
              <img src="{{ url('/storage/assets/news/'.$berita->picture_path) }}" class="img-fluid" alt="">

              <p class="card-text"><small class="text-muted">{!! $berita->keterangan_foto !!}</small></p>
              <article>
                  {!! $berita->excerpt !!}...
              </article>
              <a href="/berita/{{ $berita->slug }}" class="read-more text-sky-400">Read More...</a>
              @endforeach
          </div>
      </div>
  </div>
  <!-- Kategory Berita PIKI Terbaru End-->
  @endsection
