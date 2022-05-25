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
              <form method="post" action="{{ route('agenda.post') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Foto Agenda</label>
                      <input type="file" name="picture_path" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Nama Agenda</label>
                      <input type="text" name="nama_agenda" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Agenda</label>
                      <input type="text" name="keterangan_agenda" class="form-control">
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  .<div class="container-fluid">
      <div class="card-body">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="1%">Foto Agenda</th>
                      <th width="1%">Nama Agenda</th>
                      <th width="1%">Keterangan Agenda</th>
                      <th width="1%">Created At</th>
                      <th width="1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($agenda as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/'.$item->picture_path) }}"></td>
                      <td>{{ $item->nama_agenda }}</td>
                      <td>{{ $item->keterangan_agenda }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                          <form action="{{ route('agenda.destroy', $item->id) }}" method="POST" class="inline-block">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger">
                                  Delete
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <!---Container Fluid-->
  @endsection
