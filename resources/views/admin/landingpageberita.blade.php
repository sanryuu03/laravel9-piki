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
              <form method="post" action="{{ route('berita.post') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Foto Berita</label>
                      <input type="file" name="picture_path" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Poto</label>
                      <input type="text" name="keterangan_foto" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Isi Berita</label>
                      <input type="text" name="isi_berita" class="form-control">
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
                      <th width="1%">Foto Berita</th>
                      <th width="1%">Keterangan Foto</th>
                      <th width="1%">Isi Berita</th>
                      <th width="1%">Created At</th>
                      <th width="1%">Updated At</th>
                      <th width="0.1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($berita as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/assets/news/'.$item->picture_path) }}"></td>
                      <td>{{ $item->keterangan_foto }}</td>
                      <td>{{ $item->isi_berita }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->updated_at }}</td>
                      <td>
                      <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline">
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
  <!---Container Fluid-->
  @endsection
