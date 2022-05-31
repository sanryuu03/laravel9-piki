  @extends('layouts.main')

  @section('menuContent')


  <!-- Kategory Berita PIKI Terbaru Start-->
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <h1>News Category: {{ $category }}</h1>
  @foreach($posts as $berita)
<article>
          <h2 class="mb-lg-3">
              <a href="{{ route('read.more.berita', $berita->slug) }}" class="text-primary">{{ $berita->judul_berita }}</a>
          </h2>
          <p>
          {!! $berita->excerpt !!}
          </p>
  </article>
  @endforeach
  <!-- Kategory Berita PIKI Terbaru End-->



  @endsection
