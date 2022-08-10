  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
      }

  </style>
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3">Landing Page {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Landing {{ $menu }}</li>
          </ol>
      </div>
  </div>


  <!-- Header Start-->
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('communitypartners.update', $item->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $item->judul) }}">
                      @error('judul')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>{{ ucwords('penulis') }}</label>
                      <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $item->penulis) }}">
                      @error('penulis')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Foto Community Partners</label>
                      <input type="file" name="picture_path" class="form-control" value="{{ old(url('/storage/assets/artikel/'.$item->picture_path)) }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Community Partners</label>
                      <input id="body" type="hidden" name="konten" value={{ old('konten') }}>
                      <trix-editor input="body">{!! $item->konten !!}</trix-editor>
                  </div>

                  <button type="submit" class="mt-3 btn btn-primary">Update</button>
                  <button href="{{ route('communitypartners') }}" type="submit" class="block mt-3 btn btn-danger">Back</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
