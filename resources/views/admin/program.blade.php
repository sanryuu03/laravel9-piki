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

      <div class="mb-3 row">
          <div class="container-fluid" id="container-wrapper">
              <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                  <a href="{{ route('backend.form.add.program') }}" class="btn btn-info btn-sm">Tambah Program</a>
              </div>
          </div>
          <!-- Area Chart -->
          {{-- <div class="col">
              <div class="mb-4 card">
                  <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">gambar {{ $menu }}</h6>
          <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="text-gray-400 fas fa-ellipsis-v fa-sm fa-fw"></i>
              </a>
              <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
              </div>
          </div>
      </div>
      <div class="card-body">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="1%">File</th>
                      <th width="1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($program as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/assets/program/'.$item->picture_path) }}"></td>
                      <td>
                          <form action="{{ route('program.destroy', $item->id) }}" method="POST" class="inline-block">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Data ?')">
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
  </div>
  <div class="mb-4 col-xl-8 col-lg-7">
      <div class="card">
          <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Upload Gambar {{ $menu }}</h6>

              @if(count($errors) > 0)
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                  {{ $error }} <br />
                  @endforeach
              </div>
              @endif

              <form action="{{ route('upload.program') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <b>Pilih Gambar {{ $menu }}</b><br />
                      <p>347 x 406</p>
                      <input type="file" name="picture_path">
                  </div>

                  <input type="submit" value="Upload" class="btn btn-primary">
              </form>
          </div>
      </div>
  </div> --}}
  </div>
  <!--Program-->
  .<div class="container-fluid">
      <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="1px">Judul Program</th>
                      <th width="1px">Foto Program</th>
                      <th width="1px">Keterangan Foto</th>
                      <th width="1px">Isi Program</th>
                      <th width="1px">Created At</th>
                      <th width="1px">Updated At</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($program as $item)
                  <tr>
                      <td>{{ $item->judul_program }}</td>
                      <td><img width="150px" src="{{ url('/storage/assets/program/'.$item->picture_path_program) }}"></td>
                      <td>{!! $item->keterangan_foto !!}</td>
                      <td>{!! $item->isi_program !!}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('backend.form.edit.program', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('program.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>



  </div>
  <!---Container Fluid-->
  </div>
  @endsection
