  @extends('layouts.main')

  @section('menuContent')


  <!-- Kategory Berita Start-->
    <style>
      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {
      }

  </style>
  <h1 class="pt-5 mb-3 text-center fs-3">News Category:</h1>
  <div class="container-fluid">
      <div class="row">
          @foreach($categoryNews as $berita)
          <div class="col-md-4 mb-3">
              <a href="/categories/{{ $berita->slug }}">
                  <div class="card bg-dark text-white">
                      <img src="https://source.unsplash.com/500x500?{{ $berita->slug }}" class="card-img" alt="{{ $berita->name }}">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                          <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $berita->name }}</h5>
                      </div>
                  </div>
              </a>
          </div>
          @endforeach
      </div>
  </div>

  <!-- Kategory Berita End-->



  @endsection
