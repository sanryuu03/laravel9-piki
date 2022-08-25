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
              <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{ ucwords('informasi') }}</button>
              <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{ ucwords('dokumen') }}</button>
          </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <!-- Informasi Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('backendTentang.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('judul') }}</label>
                                  <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                                  @error('judul')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('keterangan') }}</label>
                                  <textarea id="tentang" name="keterangan"></textarea>
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
              <!--Table Informasi Start-->
              <div class="container-fluid">
                  <div class="card-body table-responsive">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="1px">{{ ucwords('judul') }}</th>
                                  <th width="1px">{{ ucwords('keterangan') }}</th>
                                  <th width="1px">Created At</th>
                                  <th width="1px">Updated At</th>
                                  <th width="0.01%">OPSI</th>
                              </tr>
                          </thead>
                          <tbody>
                                  @foreach($backendTentang as $tentang)
                              <tr>
                                  <td>{{ $tentang->judul }}</td>
                                  <td>{!! $tentang->keterangan !!}</td>
                                  <td>{{ $tentang->created_at }}</td>
                                  <td>{{ $tentang->updated_at }}</td>
                                  <td>
                                      <a href="{{ route('backendTentang.edit', $tentang->id) }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('backendTentang.destroy', $tentang->id) }}" method="POST" class="d-inline">
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
              <!-- Dokumen Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('backendDokumen.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('judul') }}</label>
                                  <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                                  @error('judul')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('link dokumen') }}</label>
                                  <input type="text" name="link_web" class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web') }}">
                                  @error('link_web')
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
              <!-- Dokumen End-->
              <!--Table Dokumen Start-->
              <div class="container-fluid">
                  <div class="card-body table-responsive">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="1px">{{ ucwords('judul') }}</th>
                                  <th width="1px">{{ ucwords('link web') }}</th>
                                  <th width="1px">Created At</th>
                                  <th width="1px">Updated At</th>
                                  <th width="0.01%">OPSI</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($backendDokumen as $key => $dokumen)
                              <tr>
                                  <td width="1px">{{ ucwords($dokumen->judul) }}</td>
                                  <td width="1px">{{ ucwords($dokumen->link_web) }}</td>
                                  <td width="1px">{{ $dokumen->created_at }}</td>
                                  <td width="1px">{{ $dokumen->updated_at }}</td>
                                  <td width="0.01%">
                                    <a href="{{ route('backendDokumen.edit', $dokumen->id) }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('backendDokumen.destroy', $dokumen->id) }}" method="POST" class="d-inline">
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
              <!--Table Dokumen End-->
          </div>
      </div>
  </div>
  <!---Container Fluid-->
  </div>
  @endsection

  @push('scripts')
  <script src="{{ asset('backend/summernote-image-attributes-master/summernote-image-attributes.js') }}"></script>
  <script>
      $('#tentang').summernote({
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


  </script>
  @endpush
