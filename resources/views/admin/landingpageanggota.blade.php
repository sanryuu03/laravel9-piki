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

  .<div class="container-fluid">
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="1%">Nama</th>
                      <th width="1%">Alamat Sesuai KTP</th>
                      <th width="1%">Telp / WA</th>
                      <th width="1%">Email</th>
                      <th width="1%">Created At</th>
                      <th width="1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($anggota as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/'.$item->picture_path) }}"></td>
                      <td>{{ $item->nama_agenda }}</td>
                      <td>{{ $item->keterangan_agenda }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                          <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="inline-block">
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
