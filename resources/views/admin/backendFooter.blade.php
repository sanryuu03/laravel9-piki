  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3">Landing Page {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Landing Page {{ $menu }}</li>
          </ol>
      </div>
      @if(session()->has('success'))
      <div class="mt-5 alert alert-success" role="alert">
          {{ session('success') }}
      </div>
      @endif
      <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{ ucwords('informasi footer') }}</button>
              <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{ ucwords('tambah footer') }}</button>
          </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <!--Table Informasi Start-->
              <div class="container-fluid">
                  <div class="card-body table-responsive">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="1px">{{ ucwords('alamat') }}</th>
                                  <th width="1px">{{ ucwords('telepon') }}</th>
                                  <th width="1px">{{ ucwords('email') }}</th>
                                  <th width="1px">{{ ucwords('FB') }}</th>
                                  <th width="1px">{{ ucwords('YT') }}</th>
                                  <th width="1px">{{ ucwords('IG') }}</th>
                                  <th width="1px">{{ ucwords('nama_perusahaan') }}</th>
                                  <th width="1px">Created At</th>
                                  <th width="1px">Updated At</th>
                                  <th width="0.01%">OPSI</th>
                              </tr>
                          </thead>
                          <tbody>
                                  @foreach($backendFooter as $tentang)
                              <tr>
                                  <td>{{ $tentang->alamat }}</td>
                                  <td>{{ $tentang->telepon }}</td>
                                  <td>{{ $tentang->email }}</td>
                                  <td>{{ $tentang->fb }}</td>
                                  <td>{{ $tentang->yt }}</td>
                                  <td>{{ $tentang->ig }}</td>
                                  <td>{{ $tentang->nama_perusahaan }}</td>
                                  <td>{{ $tentang->created_at }}</td>
                                  <td>{{ $tentang->updated_at }}</td>
                                  <td>
                                      <a href="{{ route('backendFooter.edit', $tentang->id) }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('backendFooter.destroy', $tentang->id) }}" method="POST" class="d-inline">
                                          @method('delete')
                                          @csrf
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                              <i class="fa-solid fa-trash"></i>
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <!--Table Informasi End-->
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <!-- Informasi Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('backendFooter.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('alamat') }}</label>
                                  <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                                  @error('alamat')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('telepon') }}</label>
                                  <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}">
                                  @error('telepon')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('email') }}</label>
                                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                  @error('email')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('FB') }}</label>
                                  <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" value="{{ old('fb') }}">
                                  @error('fb')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('YT') }}</label>
                                  <input type="text" name="yt" class="form-control @error('yt') is-invalid @enderror" value="{{ old('yt') }}">
                                  @error('yt')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('IG') }}</label>
                                  <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror" value="{{ old('ig') }}">
                                  @error('ig')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('nama perusahaan') }}</label>
                                  <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan') }}">
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

                              <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- Informasi End-->
          </div>
      </div>
  </div>
  <!---Container Fluid-->
  </div>
  @endsection

