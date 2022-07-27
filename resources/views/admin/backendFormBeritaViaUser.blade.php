  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <!-- header Start-->
  <style>
        .bg-gradient-primary {
            background: rgb(30, 64, 174);
        }

        .card {
            background-color: #fff;
        }
      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {}

  </style>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">

              <form method="post" action="{{ route('berita.update', $newsPiki->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('put') }}

                  <div class="form-group">
                      <label>Judul Berita</label>
                      <input id="title" type="text" name="judul_berita" class="form-control @error('judul_berita') is-invalid @enderror" value="{{ old('judul_berita', $newsPiki->judul_berita) }}">
                      @error('judul_berita')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Slug</label>
                      <input id="slug" type="text" name="slug" class="form-control" value="{{ old('slug', $newsPiki->slug) }}">
                  </div>
                  <div class="form-group">
                      <label>Foto Berita</label>
                      <input type="file" name="picture_path" class="form-control" value="{{ url('/storage/assets/news/'.$newsPiki->picture_path) }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Poto</label>
                      <input id="keterangan" type="hidden" name="keterangan_foto" value="{{ old('keterangan_foto',$newsPiki->keterangan_foto) }}">
                      <trix-editor input="keterangan"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label>Excerpt</label>
                      <input id="excerpt" type="hidden" name="excerpt" value="{{ old('excerpt', $newsPiki->excerpt) }}">
                      <trix-editor input="excerpt"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label>Isi Berita</label>
                      <input id="body" type="hidden" name="isi_berita" value="{{ old('isi_berita', $newsPiki->isi_berita) }}">
                      <trix-editor input="body"></trix-editor>
                  </div>
                  <div class="mb-3">
                      <label>Kategori Berita</label>
                      <select class="custom-select" name="category_news_id">
                          @foreach($categoryNews as $kategori)
                          @if(old('category_news_id', $newsPiki->category_news_id) == $kategori->id)
                          <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                          @else
                          <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>

                  <button type="submit" class="mt-3 btn btn-primary">Update</button>
                  <a class="mt-3 btn btn-danger" href="{{ url('/admin/backendBeritaviaUser', $userid) }}">Back</a>
              </form>
          </div>
      </div>
  </div>

  <!-- header End-->
  @endsection
