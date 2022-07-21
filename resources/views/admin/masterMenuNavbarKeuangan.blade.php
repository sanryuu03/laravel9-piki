  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('backend.keuangan') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('process'))
  <div class="alert alert-info" role="alert">
      {{ session('process') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  .<div class="container-fluid landingpage-anggota">
        <div class="row">
          <div class="col-md-4">
              <a href="{{ route('backend.form.add.master.menu.navbar.keuangan') }}" class="btn btn-warning btn-sm mb-1">Tambah Menu Navbar</a>
          </div>
      </div>
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">NO</th>
                      <th width="1%">Nama Navbar</th>
                      <th width="1%">Created At</th>
                      <th width="1%">Updated At</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($masterMenuNavbarKeuangan as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ ucwords($item->nama_menu) }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->updated_at)) }} WIB</td>
                      <td>
                          <a href="{{ route('backend.form.edit.master.menu.navbar.keuangan', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('backend.destroy.master.menu.navbar.keuangan', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash-can"></i>
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
