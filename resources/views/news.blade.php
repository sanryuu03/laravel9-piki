  @extends('layouts.main')

  @section('menuContent')


  <!-- Berita Start-->
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
      <h2 class="">
          {{ $news->judul_berita }}
      </h2>
      {{ $news->created_at }}
          <p>
  <a href="{{ route('isi.kategori', $news->categoryNews->slug) }}">{{ $news->categoryNews->name }}</a>
          </p>
          {!! $news->isi_berita !!}
  <a href="{{ route('kategori.berita') }}">Back to News</a>
  <!-- Berita End-->



  @endsection
