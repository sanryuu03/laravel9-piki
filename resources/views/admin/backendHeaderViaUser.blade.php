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
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
      </div>

      <div class="mb-3 row">

          <!-- Area Chart -->
          <div class="col">
              <div class="mb-4 card">
                  <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">gambar header Web</h6>
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
                              @foreach($header as $item)
                              <tr>
                                  <td><img width="150px" src="{{ url('/storage/assets/header/web/'.$item->picture_path) }}"></td>
                                  <td>
                                      <form action="{{ route('header.destroy', $item->id) }}" method="POST" class="inline-block">
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
                      <h6 class="m-0 font-weight-bold text-primary">Upload Gambar Header Web</h6>

                      @if(count($errors) > 0)
                      <div class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                          {{ $error }} <br />
                          @endforeach
                      </div>
                      @endif

                      <form action="{{ route('upload.header') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <b>Pilih Gambar Header</b><br />
                              <p>1366 x 615</p>
                              <input type="file" name="picture_path">
                          </div>

                          <input type="submit" value="Upload" class="btn btn-primary">
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!--Row-->

      <div class="mb-3 row">

          <!-- Header Mobile -->
          <div class="col">
              <div class="mb-4 card">
                  <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">gambar header Mobile</h6>
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
                              @foreach($headerMobile as $item)
                              <tr>
                                  <td><img width="150px" src="{{ url('/storage/assets/header/mobile/'.$item->picture_path) }}"></td>
                                  <td>
                                      <form action="{{ route('header.mobile.destroy', $item->id) }}" method="POST" class="inline-block">
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
                      <h6 class="m-0 font-weight-bold text-primary">Upload Gambar Header Mobile</h6>

                      @if(count($errors) > 0)
                      <div class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                          {{ $error }} <br />
                          @endforeach
                      </div>
                      @endif

                      <form action="{{ route('upload.header.mobile') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <b>Pilih Gambar Header</b><br />
                              <p>720 x 952</p>
                              <input type="file" name="picture_path">
                          </div>

                          <input type="submit" value="Upload" class="btn btn-primary">
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!--Header Mobile End-->
  </div>

  <!-- header End-->
  @endsection
