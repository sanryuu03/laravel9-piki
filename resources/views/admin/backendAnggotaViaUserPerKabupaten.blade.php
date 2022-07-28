  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <style>
      .bg-gradient-primary {
          background: #fff;
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

  <div class="container-fluid landingpage-anggota">
      <div class="card-body">
          <form action="{{ route('table.export') }}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="row">
                  <div class="col-md-4">
                      Filter Provinsi:
                      <select id="table-filter" class="filter-province" name="province">
                          <option value="{{ $provinces->id }}">{{ $provinces->name }}</option>
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      Filter Kabupaten / Kota:
                      <select id="table-filter" class="filter-kota" name="kota">
                          <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-info">Print Table</button>
                  </div>
              </div>
          </form>
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="1%">Nama</th>
                      <th width="1%">Alamat Sesuai KTP</th>
                      <th width="1%">Provinsi</th>
                      <th width="1%">Kabupaten/Kota</th>
                      <th width="1%">Telp / WA</th>
                      <th width="1%">Email</th>
                      <th width="1%">Created At</th>
                      <th width="2%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($userDiterima as $item)
                  <tr>
                      <td><a href="{{ route('anggota.cv', $item->id) }}" class="">{{ $item->name }}</a></td>
                      <td>{{ $item->address }}</td>
                      <td>{{ $item->province }}</td>
                      <td>{{ $item->city }}</td>
                      <td>{{ $item->phone_number }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                          <a href="{{ route('anggota.cv', $item->id) }}" class="mb-1 btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                          <a href="{{ route('anggota.export', $item->id) }}" class="mb-1 btn btn-success btn-sm"><i class="fa-solid fa-print"></i></a>
                          {{-- <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  Delete
                              </button>
                          </form> --}}
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @endsection
