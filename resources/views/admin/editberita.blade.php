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
                  {{ method_field('put') }}

                  <div class="form-group">
                      <label>Judul Berita</label>
                      <input id="title" type="text" name="judul_berita" class="form-control @error('judul_berita') is-invalid @enderror" value="{{ old('judul_berita', $item->judul_berita) }}">
                      @error('judul_berita')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Slug</label>
                      <input id="slug" type="text" name="slug" class="form-control" value="{{ old('slug', $item->slug) }}">
                  </div>
                  <div class="form-group">
                      <label>Foto Berita</label>
                      <input type="file" name="picture_path" class="form-control" value="{{ url('/storage/assets/news/'.$item->picture_path) }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Poto</label>
                      <input id="keterangan" type="hidden" name="keterangan_foto" value="{{ old('keterangan_foto',$item->keterangan_foto) }}">
                      <trix-editor input="keterangan"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label>Excerpt</label>
                      <input id="excerpt" type="hidden" name="excerpt" value="{{ old('excerpt', $item->excerpt) }}">
                      <trix-editor input="excerpt"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label>Isi Berita</label>
                      <input id="body" type="hidden" name="isi_berita" value="{{ old('isi_berita', $item->isi_berita) }}">
                      <trix-editor input="body"></trix-editor>
                  </div>
                  <div class="mb-3">
                      <label>Kategori Berita</label>
                      <select class="custom-select" name="category_news_id">
                          @foreach($categoryNews as $kategori)
                          @if(old('category_news_id', $item->category_news_id) == $kategori->id)
                          <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                          @else
                          <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Update</button>
                  <a class="btn btn-danger mt-3" href="{{ route('berita') }}">Back</a>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
