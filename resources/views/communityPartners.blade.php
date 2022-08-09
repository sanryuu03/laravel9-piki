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
  <div class="pt-5 container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <h1 class="fs-1">
                  {{ $communityPartners->judul_program }}
              </h1>
              <p>
                  {{ $program->created_at }}
              </p>
              <img src="{{ url('/storage/assets/program/'.$program->picture_path_program) }}" class="img-fluid" alt="">

              <p class="card-text"><small class="text-muted">{!! $program->keterangan_foto !!}</small></p>
              <article>
              {!! $program->isi_program !!}
              </article>

              <a class="btn btn-danger" href="{{ route('index') }}">{{ ucwords('Back to Home') }}</a>
          </div>
      </div>
  </div>

  <!-- Berita End-->



  @endsection
