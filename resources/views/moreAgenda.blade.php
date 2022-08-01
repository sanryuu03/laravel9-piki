  @extends('layouts.main')

  @section('menuContent')


  <!-- Kategory Berita Start-->
  <style>
      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {}

  </style>
  <h1 class="pt-5 mb-3 text-center fs-3">{{ ucwords('agenda lainnya:') }}</h1>
  <div class="container-fluid">
      <div class="row">
          @foreach($agendaPiki as $agenda)
          <div class="mb-3 col-md-4">
              <a href="/isiMoreAgenda/{{ $agenda->id }}">
                  <div class="text-white card bg-dark">
                      @if($agenda->picture_path !== NULL)
                      <img src="{{ url('/storage/assets/agenda/'.$agenda->picture_path) }}" class="card-img img-fluid" alt="{{ $agenda->nama_agenda }}" style="width:500px; height:395px;">
                      @else
                      <img src="{{ url('/storage/assets/agenda/'.$agenda->picture_path) }}" class="card-img" alt="{{ $agenda->nama_agenda }}">
                      @endif
                      <div class="p-0 card-img-overlay d-flex align-items-center">
                          <h5 class="p-4 text-center card-title flex-fill fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $agenda->nama_agenda }}</h5>
                      </div>
                  </div>
              </a>
          </div>
          @endforeach
      </div>
  </div>

  <!-- Kategory Berita End-->



  @endsection

