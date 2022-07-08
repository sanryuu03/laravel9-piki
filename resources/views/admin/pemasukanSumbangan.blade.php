  @extends('admin.layouts.main')

  @section('menuContent')

      <div class="container-fluid">
      <div class="card-body">
          <div class="row mb-3">
              <!-- New User Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pendaftarBaru') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sumbangan Baru</div>
                                      <div class="mt-2 mb-0 text-muted text-xs">
                                          <span>Belum di proses</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-money-bill-wave fa-2x text-info"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- Dalam Proses Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/dalamProses') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sumbangan Diproses</div>
                                      <div class="mt-2 mb-0 text-muted text-xs">
                                          <span>Sedang di verifikasi</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-tasks fa-2x text-primary"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- Ditolak Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/diTolak') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sumbangan ditolak</div>
                                      <div class="mt-2 mb-0 text-muted text-xs">
                                          <span>Verifikasi gagal</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-user-times fa-2x text-danger"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

              <!-- Diterima Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/landingpageanggota') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sumbangan terverifikasi</div>
                                      <div class="mt-2 mb-0 text-muted text-xs">
                                          <span>Sumbangan diterima</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-file-circle-check fa-2x text-success"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('backend.keuangan') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> {{ $menu }}</li>
          </ol>
      </div>
  </div>

  .<div class="container-fluid landingpage-anggota">
      <div class="card-body">
          <form action="{{ route('table.export') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-md-4">
                      Filter Tanggal:
                      <input id="date" class="form-control" type="text" name="date" placeholder="YYYY/MM/DD" value="{{ old('date') }}" />
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      Filter Sampai Dengan:
                      <input id="date" class="form-control" type="text" name="date" placeholder="YYYY/MM/DD" value="{{ old('date') }}" />
                  </div>
              </div>
              <div class="row mb-5">
                  <div class="col-md-4">
                      Nama:
                      <input id="nama" class="form-control" type="text" name="nama" placeholder="" value="{{ old('date') }}" />
                  </div>
              </div>
              {{-- <div class="row">
                  <div class="col-md-4">
                      <button type="submit" class="btn btn-info">Print Table</button>
                  </div>
              </div> --}}
          </form>
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">NO</th>
                      <th width="1%">Tanggal</th>
                      <th width="1%">Nama</th>
                      <th width="1%">Jumlah</th>
                      <th width="1%">Berita</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($rekapSumbangan as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      <td><a href="{{ route('backend.sumbangan.detail', $item->id) }}" class="">{{ $item->nama_penyumbang }}</a></td>
                      <td>{{ number_format($item->jumlah_sumbangan,0,",",".") }}</td>
                      <td>{{ $item->berita }}</td>
                      <td>
                          <a href="{{ route('backend.sumbangan.detail', $item->id) }}" class="btn btn-primary btn-sm mb-1"><i class="fa-solid fa-eye"></i></a>
                          <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
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
  <!---Container Fluid-->
  @endsection
