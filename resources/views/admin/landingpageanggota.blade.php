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
                  @foreach($user->skip(6) as $item)
                  <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->address }}</td>
                      <td>{{ $item->phone_number }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                      <a href="{{ route('anggota.cv', $item->id) }}" class="btn btn-primary btn-sm mb-1">View</a>
                      <a href="{{ route('anggota.export', $item->id) }}" class="btn btn-success btn-sm mb-1">Print</a>
                      <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                          <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
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
