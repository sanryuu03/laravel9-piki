  @extends('admin.layouts.main')

  @section('menuContent')
  <div class="container-fluid">
      <div class="card-body">
          <div class="row mb-3">
              <!-- New User Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanSumbanganBaru') }}" class="d-flex">
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
                      <a href="{{  url('/admin/pemasukanSumbanganDiproses') }}" class="d-flex">
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
                      <a href="{{  url('/admin/pemasukanSumbanganDitolak') }}" class="d-flex">
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
                      <a href="{{  url('/admin/pemasukanSumbanganDiterima') }}" class="d-flex">
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
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('backendanggota') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('process'))
  <div class="alert alert-info" role="alert">
      {{ session('process') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  .<div class="container-fluid landingpage-anggota">
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">NO</th>
                      <th width="1%">Tanggal</th>
                      <th width="1%">Nama</th>
                      <th width="1%">Jumlah Sumbangan</th>
                      <th width="1%">Berita</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($rekapSumbangan as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      <td><a href="{{ route('backend.sumbangan.detail.via.bendahara', $item->id) }}" class="">{{ $item->nama_penyumbang }}</a></td>
                      <td>{{ number_format($item->jumlah_sumbangan,0,",",".") }}</td>
                      <td>{{ $item->berita }}</td>
                      <td>
                          <a href="{{ route('backend.sumbangan.detail.via.bendahara', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                          <form action="{{ route('backend.post.sumbangan.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </form>
                          <a href="{{ route('backend.post.sumbangan.diverifikasi.bendahara.via.form', $item->id) }}" class="btn btn-success btn-sm">Verifikasi</a>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#showIuranBaruModal">Tolak</button>
                          <!-- Modal Alasan Start-->
                          <div class="modal fade" id="showIuranBaruModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="{{ route('backend.post.sumbangan.ditolak', $item->id) }}" method="post">
                                              @csrf
                                              <div class="form-group">
                                                  <label for="message-text" class="col-form-label">Message:</label>
                                                  <textarea class="form-control" id="message-text" name="alasan_ditolak"></textarea>
                                              </div>
                                              <button type="submit" class="btn btn-info">Send message</button>
                                          </form>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Modal Alasan End-->
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <!---Container Fluid-->
  @endsection
