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
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a>{{ $menu }}</h1>
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
              <form method="post" action="{{ route('save.form.program') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Judul Program</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $program->id }}">
                      <input id="title" type="text" name="judul_program" class="form-control @error('judul_program') is-invalid @enderror" value="{{ old('judul_program', $program->judul_program) }}">
                      @error('judul_program')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Slug</label>
                      <input id="slug" type="text" readonly name="slug" class="form-control" value="{{ old('slug', $program->slug) }}">
                  </div>
                  <div class="form-group">
                      <label>Foto Program</label>
                      @if($program->picture_path_program)
                      <div></div><img width="150px" src="{{ url('/storage/assets/program/'.$program->picture_path_program) }}"></div>
                      @endif
                      <input type="file" name="picture_path_program" class="form-control" value="{{ url('/storage/assets/news/'.$program->picture_path_program) }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Poto</label>
                      <input id="keterangan" type="hidden" name="keterangan_foto" value="{{ old('keterangan_foto',$program->keterangan_foto) }}">
                      <trix-editor input="keterangan"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label>Isi Program</label>
                      <input id="body" type="hidden" name="isi_program" value="{{ old('isi_program', $program->isi_program) }}">
                      <trix-editor input="body"></trix-editor>
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

                  <a class="mt-3 btn btn-danger" href="{{ route('backend.keuangan') }}">Back</a>
                  <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
