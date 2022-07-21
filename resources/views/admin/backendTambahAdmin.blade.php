  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
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
  @elseif(session()->has('error'))
  <div class="alert alert-danger" role="alert">
      {{ session('error') }}
  </div>
  @endif
  <div class="row">
      <div class="col-md-4">
          <a href="{{ route('backend.tambah.admin') }}" class="btn btn-primary btn-sm mb-1 ml-5">Tambahkan Admin</a>
      </div>
  </div>
  <!---Container Fluid-->
  <div class="container-fluid">
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">No</th>
                      <th width="1%">Nama Akun</th>
                      <th width="1%">Roles</th>
                      <th width="1%">Permissions</th>
                      <th width="0.1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->name }}</td>
                      <td>
                          @foreach($user->roles as $role)
                          <span class="badge bg-warning">{{ $role->name }}</span>
                          @endforeach
                      </td>
                      <td>
                          @foreach($user->Permissions as $Permission)
                          <span class="badge bg-danger text-white">{{ $Permission->name }}</span>
                          @endforeach
                      </td>
                      <td>
                          {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a> --}}
                          <a href="{{ route('backend.edit.admin', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('backend.hapus.tambah.admin', $user->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash"></i>
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
