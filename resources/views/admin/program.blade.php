  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Landing Page {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Landing Page {{ $menu }}</li>
          </ol>
      </div>

      <div class="row mb-3">

          <!-- Area Chart -->
          <div class="col">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">gambar {{ $menu }}</h6>
                      <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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
          <div class="col-xl-8 col-lg-7 mb-4">
              <div class="card">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
          </div>
      </div>
      <!--Row-->



  </div>
  <!---Container Fluid-->
  </div>
  @endsection
