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
              <form method="post" action="{{ route('backendFooter.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <input type="hidden" name="id" class="form-control" value="{{ $backendFooter->id ?? '' }}">
                      <label>{{ ucwords('alamat') }}</label>
                      <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat',$backendFooter->alamat ?? '') }}">
                      @error('alamat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                              <div class="form-group">
                                  <label>{{ ucwords('telepon') }}</label>
                                  <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon',$backendFooter->telepon ?? '') }}">
                                  @error('telepon')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('email') }}</label>
                                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$backendFooter->email ?? '') }}">
                                  @error('email')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('FB') }}</label>
                                  <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" value="{{ old('fb',$backendFooter->fb ?? '') }}">
                                  @error('fb')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('YT') }}</label>
                                  <input type="text" name="yt" class="form-control @error('yt') is-invalid @enderror" value="{{ old('yt',$backendFooter->yt ?? '') }}">
                                  @error('yt')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('IG') }}</label>
                                  <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror" value="{{ old('ig',$backendFooter->ig ?? '') }}">
                                  @error('ig')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('nama perusahaan') }}</label>
                                  <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan',$backendFooter->nama_perusahaan ?? '') }}">
                                  @error('nama_perusahaan')
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

                  <a class="mt-3 btn btn-danger" href="{{ route('backendFooter.index') }}">Back</a>
                  <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
