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


  <!-- Header Start-->
  <div class="card mx-3 my-3">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('update.jabatan.piki.sumut', $item->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="form-group">
                      <label>Nama Anggota</label>
                      <input type="text" name="name" class="form-control" readonly value="{{ $item->name }}">
                  </div>
                  <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan_piki_sumut" class="form-control" value="{{ $item->jabatan_piki_sumut }}">
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Update</button>
                  <a class="btn btn-danger mt-3" href="{{ route('jabatan.piki.sumut') }}">Back</a>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
