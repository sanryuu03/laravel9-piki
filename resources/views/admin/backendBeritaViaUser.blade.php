  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <!-- header Start-->
  <style>
        .bg-gradient-primary {
            background: rgb(30, 64, 174);
        }

        .card {
            background-color: #0ec8f7;
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

                  <button type="submit" class="mt-3 btn btn-primary">Save</button>
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
                      <th width="10px" class='text-white'>Judul Berita</th>
                      <th width="10px" class='text-white'>Foto Berita</th>
                      <th width="10px" class='text-white'>Keterangan Foto</th>
                      <th width="10px" class='text-white'>Isi Berita</th>
                      <th width="10px" class='text-white'>Kategori Berita</th>
                      <th width="10px" class='text-white'>Created At</th>
                      <th width="10px" class='text-white'>Updated At</th>
                      <th width="0.1%" class='text-white'>OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($berita as $item)
                  <tr>
                      <td class='text-white'>{{ $item->judul_berita }}</td>
                      <td><img width="150px" src="{{ url('/storage/assets/news/'.$item->picture_path) }}"></td>
                      <td class='text-white'>{!! $item->keterangan_foto !!}</td>
                      <td class='text-white'>{!! $item->isi_berita !!}</td>
                      <td class='text-white'>{{ $item->categoryNews->name }}</td>
                      <td class='text-white'>{{ $item->created_at }}</td>
                      <td class='text-white'>{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('crud.berita.via.user', [$userid,$item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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

  <!-- header End-->
  @endsection
