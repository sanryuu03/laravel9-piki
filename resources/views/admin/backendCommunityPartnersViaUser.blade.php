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

  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('communitypartners.post') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Foto Community Partners</label>
                      <input type="file" name="picture_path" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Community Partners</label>
                      <input id="body" type="hidden" name="konten_sponsor" value={{ old('konten_sponsor') }}>
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
                      <th width="1%" class="text-white">Foto Community Partners</th>
                      <th width="1%" class="text-white">Keterangan Community Partners</th>
                      <th width="1%" class="text-white">Created At</th>
                      <th width="1%" class="text-white">Updated At</th>
                      <th width="1%" class="text-white">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($sponsor as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/assets/artikel/'.$item->picture_path) }}"></td>
                      <td class="text-white">{!! $item->konten_sponsor !!}</td>
                      <td class="text-white">{{ $item->created_at }}</td>
                      <td class="text-white">{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('communitypartners.edit.via.user', [$userid,$item->id]) }}" class="inline-block btn btn-warning">Edit</a>
                          <form action="{{ route('communitypartners.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  Delete
                              </button>
                          </form>
                      </td>
                      @endforeach
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
  @endsection
