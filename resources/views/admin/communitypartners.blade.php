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
              <form method="post" action="{{ route('communitypartners.post') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                      @error('judul')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>{{ ucwords('penulis') }}</label>
                      <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis') }}">
                      @error('penulis')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Foto Community Partners</label>
                      <input type="file" name="picture_path" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Community Partners</label>
                      <input id="body" type="hidden" name="konten" value={{ old('konten') }}>
                      <trix-editor input="body"></trix-editor>
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
                      <th width="1%">{{ ucwords('judul') }}</th>
                      <th width="1%">{{ ucwords('penulis') }}</th>
                      <th width="1%">Foto Community Partners</th>
                      <th width="1%">Keterangan Community Partners</th>
                      <th width="1%">Created At</th>
                      <th width="1%">Updated At</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($sponsor as $item)
                  <tr>
                      <td>{{ $item->judul }}</td>
                      <td>{{ $item->penulis }}</td>
                      <td><img width="150px" src="{{ url('/storage/assets/artikel/'.$item->picture_path) }}"></td>
                      <td>{!! $item->konten !!}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('communitypartners.edit', $item->id) }}" class="mb-1 btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('communitypartners.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash"></i>
                              </button>
                          </form>
                      </td>
                      @endforeach
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

  <!---Container Fluid-->
  @endsection
