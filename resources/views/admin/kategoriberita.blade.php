  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->

  <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
      }

  </style>
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between">
          <a href="{{ route('backend.add.kategori.berita') }}" class="btn btn-warning btn-sm">Tambah Kategori Berita</a>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  .<div class="container-fluid">
      <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="10px">Kategori Berita</th>
                      <th width="10px">Slug Berita</th>
                      <th width="10px">Keterangan Foto</th>
                      <th width="10px">Created At</th>
                      <th width="10px">Updated At</th>
                      <th width="10px">Post By</th>
                      <th width="10px">Edited By</th>
                      <th width="0.1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($categoryNews as $item)
                  <tr>
                      <td>{{ $item->name }}</td>
                      <td>{!! $item->slug !!}</td>
                      <td><img width="150px" src="{{ url('/storage/assets/categorynews/'.$item->picture_path_kategori_berita) }}"></td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->updated_at)) }} WIB</td>
                      <td>{{ $item->post_by }}</td>
                      <td>{{ $item->edited_by }}</td>
                      <td>
                          <a href="{{ route('backend.edit.kategori.berita', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{ route('destroy.kategori.berita', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
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
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection

