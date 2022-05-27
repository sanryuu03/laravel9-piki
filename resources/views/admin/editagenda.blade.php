  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Landing Page {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Landing {{ $menu }}</li>
          </ol>
      </div>
  </div>


  <!-- Header Start-->
  <div class="card mx-3 my-3">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('agenda.update', $item->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="form-group">
                      <label>Foto Agenda</label>
                      @if($item->picture_path)
                      <td><img class="d-block mb-3" width="150px" src="{{ asset('/storage/assets/agenda/'.$item->picture_path) }}"></td>
                      @else
                      <td><img width="150px" src=""></td>
                      @endif
                      <input type="file" name="picture_path" class="form-control" value="{{ asset('/storage/assets/agenda/'.$item->picture_path) }}">
                  </div>
                  <div class="form-group">
                      <label>Nama Agenda</label>
                      <input type="text" name="nama_agenda" class="form-control" value="{{ $item->nama_agenda }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Agenda</label>
                      <input type="text" name="keterangan_agenda" class="form-control" value="{{ $item->keterangan_agenda }}">
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Update</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
