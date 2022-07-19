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
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a>{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success mt-5" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="card mx-3 my-3">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('backend.save.form.sub.kategori.anggota') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>kategori Anggota</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $subKategoriAnggota->id }}">
                      <select class="custom-select" name="kategori_anggota_id">
                          @foreach($kategoriAnggota as $anggota)
                          @if(old('kategori_anggota_id') == $anggota->id)
                          <option value="{{ $anggota->id }}" selected>{{ $anggota->name }}</option>
                          @else
                          <option value="{{ $anggota->id }}">{{ $anggota->name }}</option>
                          @endif
                          @endforeach
                      </select>
                      @error('nama_pos_anggaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Sub kategori Anggota</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $subKategoriAnggota->name) }}">
                      @error('name')
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

                  <a class="btn btn-danger mt-3" href="{{ route('kategori.anggota') }}">Back</a>
                  <button type="submit" class="btn btn-primary mt-3" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
