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
                      <textarea id="summernote" name="keterangan_foto"></textarea>
                  </div>
                  {{-- <div class="form-group">
                      <label>Excerpt</label>
                      <input id="excerpt" type="hidden" name="excerpt" value="{{ old('excerpt', $newsPiki->excerpt) }}">
                      <trix-editor input="excerpt"></trix-editor>
                  </div> --}}
                  <div class="form-group">
                      <label>Isi Berita</label>
                      <textarea id="isi_berita" name="isi_berita"></textarea>
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
                  <a class="mt-3 btn btn-danger" href="{{ route('berita') }}">Back</a>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
  @push('scripts')
  <script src="{{ asset('backend/summernote-image-attributes-master/summernote-image-attributes.js') }}"></script>
  <script>
      let HTMLstringFoto = '{!! $newsPiki->keterangan_foto ?? '' !!}';
      $('#summernote').summernote('code', HTMLstringFoto);

      let HTMLstringIsi = '{!! $newsPiki->isi_berita ?? '' !!}';
      $('#isi_berita').summernote({
          placeholder: 'Hello Bootstrap 4', tabsize: 2,
          focus: true,
          popover: {
              image: [
                  ['custom', ['imageAttributes']]
                  , ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']]
                  , ['float', ['floatLeft', 'floatRight', 'floatNone']]
                  , ['remove', ['removeMedia']]
              ], }, imageAttributes: {
              icon: '<i class="note-icon-pencil"/>', removeEmpty: false, // true = remove attributes | false = leave empty if present
              disableUpload: false // true = don't display Upload Options | Display Upload Options
          }
      });
      $('#isi_berita').summernote('code', HTMLstringIsi);

  </script>
  @endpush
