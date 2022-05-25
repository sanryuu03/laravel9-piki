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

              <form method="post" action="{{ route('berita.update', $item->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                  <div class="form-group">
                      <label>Foto Berita</label>
                      <input type="file" name="picture_path" class="form-control" value="{{ url('/storage/assets/news/'.$item->picture_path) }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Poto</label>
                      <input type="text" name="keterangan_foto" class="form-control" value="{{ $item->keterangan_foto }}">
                  </div>
                  <div class="form-group">
                      <label>Isi Berita</label>
                      <input type="text" name="isi_berita" class="form-control" value="{{ $item->isi_berita }}">
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Update</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
