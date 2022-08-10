@extends('layouts.main')

  @section('menuContent')


  <!-- Berita Start-->
  <div class="pt-5 mt-5 mb-1 container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <h1 class="fs-1">
                  {{ $SponsorPiki->judul }}
              </h1>
              <p>
                  {{ $SponsorPiki->created_at }}
              </p>
              <img src="{{ url('/storage/assets/artikel/'.$SponsorPiki->picture_path) }}" class="img-fluid" alt="">

              <article>
              {!! $SponsorPiki->konten !!}
              </article>

              <a class="mt-1 btn btn-danger" href="{{ url('/#artikel') }}">{{ ucwords('Back to artikel') }}</a>
          </div>
      </div>
  </div>

  <!-- Berita End-->



  @endsection
