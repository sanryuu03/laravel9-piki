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
          <h1 class="mb-0 text-gray-800 h3">{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="mt-5 alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('backend.save.form.edit.data.biaya.iuran') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Besaran Biaya Iuran</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $dataIuran->id }}">
                      <input id="title" type="text" name="biaya_iuran" class="form-control @error('biaya_iuran') is-invalid @enderror" value="{{ old('biaya_iuran', $dataIuran->biaya_iuran) }}">
                      @error('biaya_iuran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                  @if($action == "add")
                      <label>Di Posting Oleh</label>
                      <input type="text" readonly name="post_by" class="form-control" value="{{ old('post_by', $namaUser) }}">
                  @else
                      <label>Di Edit Oleh</label>
                      <input type="text" readonly name="edited_by" class="form-control" value="{{ old('edited_by', $namaUser) }}">
                  @endif
                  </div>

                  <a class="mt-3 btn btn-danger" href="{{ route('backend.data.biaya.iuran') }}">Back</a>
                  <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection

