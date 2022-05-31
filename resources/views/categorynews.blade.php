  @extends('layouts.main')

  @section('menuContent')


  <!-- Kategory Berita Terbaru Start-->
  @foreach($categoryNews as $berita)
  <ul class="lg:pt-5">
      <li>
          <h2>
              <a href="/categories/{{ $berita->slug }}">{{ $berita->name }}</a>
          </h2>
      </li>
  </ul>
  @endforeach
  <!-- Kategory Berita Terbaru End-->



  @endsection
