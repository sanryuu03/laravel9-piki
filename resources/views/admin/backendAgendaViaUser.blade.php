  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


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
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  <!-- Header Start-->
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('agenda.post') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Foto Agenda</label>
                      <input type="file" name="picture_path" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Nama Agenda</label>
                      <input type="text" name="nama_agenda" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Agenda</label>
                      <input id="body" type="hidden" name="keterangan_agenda" value={{ old('keterangan_agenda') }}>
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
                      <th width="1%" class="text-white">Foto Agenda</th>
                      <th width="1%" class="text-white">Nama Agenda</th>
                      <th width="1%" class="text-white">Keterangan Agenda</th>
                      <th width="1%" class="text-white">Created At</th>
                      <th width="1%" class="text-white">Updated At</th>
                      <th width="1%" class="text-white">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($agenda as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/assets/agenda/'.$item->picture_path) }}"></td>
                      <td class="text-white">{{ $item->nama_agenda }}</td>
                      <td class="text-white">{!! $item->keterangan_agenda !!}</td>
                      <td class="text-white">{{ $item->created_at }}</td>
                      <td class="text-white">{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('agenda.edit.via.user', [$userid,$item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{ route('agenda.destroy', $item->id) }}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
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
  @endsection
