  @extends('admin.layouts.main')

  @section('menuContent')
  <div class="container-fluid">
      <div class="card-body">
          <div class="mb-3 row">
              <!-- New User Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanIuranBaru') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Iuran Baru</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
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
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanIuranDiproses') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Iuran Diproses</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
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
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanIuranDitolak') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Iuran ditolak</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
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
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanIuranDiterima') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Iuran terverifikasi</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Iuran diterima</span>
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
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ route('backend.iuran') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
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
                      <th width="1%">Jumlah Iuran</th>
                      <th width="1%">Berita</th>
                      <th width="0.01%">Bendahara</th>
                      <th width="0.01%">Ketua</th>
                      <th width="0.01%">SPI</th>
                      <th width="0.01%">Alasan Ditolak</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($pemasukanIuran as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      @if(auth()->user()->level=='bendahara')
                      <td><a href="{{ route('backend.iuran.detail.via.bendahara', $item->id) }}" class="">{{ $item->nama_penyetor }}</a></td>
                      @elseif(auth()->user()->level=='super-admin')
                      <td><a href="{{ route('backend.iuran.detail.via.ketua', $item->id) }}" class="">{{ $item->nama_penyetor }}</a></td>
                      @elseif(auth()->user()->level=='spi')
                      <td><a href="{{ route('backend.iuran.detail.via.spi', $item->id) }}" class="">{{ $item->nama_penyetor }}</a></td>
                      @endif
                      <td>Rp. {{ number_format($item->jumlah,0,",",".") }}</td>
                      <td>{{ $item->berita }}</td>
                      <td>{{ $item->status_verifikasi_bendahara }}</td>
                      <td>{{ $item->status_verifikasi_ketua }}</td>
                      <td>{{ $item->status_verifikasi_spi }}</td>
                      <td>{{ $item->alasan_ditolak }}</td>
                      <td>
                          <a href="{{ route('backend.iuran.detail.via.bendahara', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                          <form action="{{ route('backend.post.iuran.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </form>
                          @if(auth()->user()->level=='spi')
                          <a href="{{ route('backend.post.iuran.diverifikasi.spi.via.form', $item->id) }}" class="btn btn-success btn-sm">Verifikasi SPI</a>
                          @elseif(auth()->user()->level=='super-admin')
                          <a href="{{ route('backend.post.iuran.diverifikasi.ketua.via.form', $item->id) }}" class="btn btn-success btn-sm">Verifikasi Ketua</a>
                          @elseif(auth()->user()->level=='bendahara')
                          <a href="{{ route('backend.post.iuran.diverifikasi.bendahara.via.form', $item->id) }}" class="btn btn-success btn-sm">Verifikasi Bendahara</a>
                          @endif
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#showIuranBaruModal">Tolak</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <!---Container Fluid-->
  <!-- Modal Alasan Start-->
                  @foreach($pemasukanIuran as $item)

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
                  <form action="{{ route('backend.post.iuran.ditolak', $item->id) }}" method="post">
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
                  @endforeach

  <!-- Modal Alasan End-->
  @endsection
