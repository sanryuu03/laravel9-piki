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
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <a href="{{ route('backend.kategori.berita') }}" class="btn btn-info btn-sm">List Kategori Berita</a>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="card mx-3 my-3">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('berita.post') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Judul Berita</label>
                      <input id="title" type="text" name="judul_berita" class="form-control @error('judul_berita') is-invalid @enderror" value="{{ old('judul_berita') }}">
                      @error('judul_berita')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Slug</label>
                      <input id="slug" type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                      @error('slug')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Foto Berita</label>
                      <input type="file" name="picture_path" class="form-control @error('picture_path') is-invalid @enderror">
                      @error('picture_path')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Keterangan Poto</label>
                      @error('keterangan_foto')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <input id="keterangan" type="hidden" name="keterangan_foto" value="{{ old('keterangan_foto') }}">
                      <trix-editor input="keterangan"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label>Isi Berita</label>
                      @error('isi_berita')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <input id="isi_berita" type="hidden" name="isi_berita" value="{{ old('isi_berita') }}">
                      <trix-editor input="isi_berita"></trix-editor>
                  </div>
                  <div class="mb-3">
                      <label>Kategori Berita</label>
                      <select class="custom-select" name="category_news_id">
                          @foreach($categoryNews as $kategori)
                          @if(old('category_news_id') == $kategori->id)
                          <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                          @else
                          <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  .<div class="container-fluid">
      <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="10px">Judul Berita</th>
                      <th width="10px">Foto Berita</th>
                      <th width="10px">Keterangan Foto</th>
                      <th width="10px">Isi Berita</th>
                      <th width="10px">Kategori Berita</th>
                      <th width="10px">Created At</th>
                      <th width="10px">Updated At</th>
                      <th width="0.1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($berita as $item)
                  <tr>
                      <td>{{ $item->judul_berita }}</td>
                      <td><img width="150px" src="{{ url('/storage/assets/news/'.$item->picture_path) }}"></td>
                      <td>{!! $item->keterangan_foto !!}</td>
                      <td>{!! $item->isi_berita !!}</td>
                      <td>{{ $item->categoryNews->name }}</td>
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

