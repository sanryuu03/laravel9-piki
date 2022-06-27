  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('backendanggota') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>

  .<div class="container-fluid landingpage-anggota">
      <div class="card-body">
          <form action="{{ route('table.export') }}" method="POST" enctype="multipart/form-data">
          @csrf
              {{-- <div class="row">
                  <div class="col-md-4">
                      Filter Provinsi:
                      <select id="table-filter" class="filter-province" name="province">
                          <option value="">All</option>
                          @foreach ($provinces as $provinsi)
                          <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      Filter Kabupaten / Kota:
                      <select id="table-filter" class="filter-kota" name="kota">
                          <option value="">All</option>
                          @foreach ($cities as $city)
                          <option value="{{ $city->name }}">{{ $city->name }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-info">Print Table</button>
                  </div>
              </div> --}}
          </form>
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="1%">Nama</th>
                      <th width="1%">Alasan Ditolak</th>
                      <th width="1%">Created At</th>
                      <th width="1%">Updated At</th>
                      <th width="1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($user as $item)
                  <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->alasan_ditolak }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('tidakSesuai.cv', $item->id) }}" class="btn btn-primary btn-sm mb-1 d-inline">View</a>
                          {{-- <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="btn-sm d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
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
  <!---Container Fluid-->
  @endsection
