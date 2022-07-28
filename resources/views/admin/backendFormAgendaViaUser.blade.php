  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <style>
      .bg-gradient-primary {
          background: rgb(30, 64, 174);
      }

      .card {
          background-color: #fff;
      }

      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {}

  </style>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('agenda.update', $agendaPiki->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="form-group">
                      <label>Foto Agenda</label>
                      @if($agendaPiki->picture_path)
                      <td><img class="mb-3 d-block" width="150px" src="{{ asset('/storage/assets/agenda/'.$agendaPiki->picture_path) }}"></td>
                      @else
                      <td><img width="150px" src=""></td>
                      @endif
                      <input type="file" name="picture_path" class="form-control" value="{{ asset('/storage/assets/agenda/'.$agendaPiki->picture_path) }}">
                  </div>
                  <div class="form-group">
                      <label>Nama Agenda</label>
                      <input type="text" name="nama_agenda" class="form-control" value="{{ $agendaPiki->nama_agenda }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Agenda</label>
                      <input id="body-agenda" type="hidden" name="keterangan_agenda" value="{{ old('keterangan_agenda', $agendaPiki->keterangan_agenda) }}">
                      <trix-editor input="body-agenda"></trix-editor>
                  </div>

                  <button type="submit" class="mt-3 btn btn-primary">Update</button>
                  <button href="{{ route('agenda.index') }}" class="block mt-3 btn btn-danger">Back</button>
              </form>
          </div>
      </div>
  </div>
  @endsection
