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
  <div class="mt-3 container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <a href="{{ route('backend.form.add.program') }}" class="btn btn-info btn-sm">Tambah Program</a>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  <!--Program-->
  .<div class="container-fluid">
      <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="1px" class="text-white">Judul Program</th>
                      <th width="1px" class="text-white">Slug</th>
                      <th width="1px" class="text-white">Foto Program</th>
                      <th width="1px" class="text-white">Keterangan Foto</th>
                      <th width="1px" class="text-white">Isi Program</th>
                      <th width="1px" class="text-white">Created At</th>
                      <th width="1px" class="text-white">Updated At</th>
                      <th width="0.01%" class="text-white">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($program as $item)
                  <tr>
                      <td class="text-white">{{ $item->judul_program }}</td>
                      <td class="text-white">{{ $item->slug }}</td>
                      <td><img width="150px" src="{{ url('/storage/assets/program/'.$item->picture_path_program) }}"></td>
                      <td class="text-white">{!! $item->keterangan_foto !!}</td>
                      <td class="text-white">{!! $item->isi_program !!}</td>
                      <td class="text-white">{{ $item->created_at }}</td>
                      <td class="text-white">{{ $item->updated_at }}</td>
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

  <!-- header End-->
  @endsection
