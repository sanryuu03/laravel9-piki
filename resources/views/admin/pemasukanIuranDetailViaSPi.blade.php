  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ route('backend.iuran.diproses') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
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
  <div class="container-fluid">
      <div class="mx-3 my-3 card">
          <div class="card-body">
              <div class="container-fluid">
                  <form method="post" action="{{ route('backend.post.iuran.diverifikasi.spi', $item->id) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  Jenis Setoran:
                                  <input id="jenis_setoran" readonly type="text" name="jenis_pendapatan" class="form-control @error('jenis_pendapatan') is-invalid @enderror" value="{{ old('jenis_pendapatan', $pemasukanIuran->jenis_pendapatan) }}">
                              </div>
                          </div>
                      </div>
                      <div id="iuran-bulan" class="form-group">
                          <label>Iuran Bulan </label>
                          <input id="iuran" readonly type="text" name="iuran_bulan" class="form-control @error('iuran_bulan') is-invalid @enderror" value="{{ old('iuran_bulan', $pemasukanIuran->iuran_bulan) }}">
                          @error('iuran_bulan')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group jumlah-iuran">
                          <label>Jumlah Iuran </label>
                          <input id="uang" readonly type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', 'Rp. '.number_format($pemasukanIuran->jumlah,0,",",".")) }}">
                          @error('jumlah')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nama Penyumbang </label>
                          <input type="text" readonly name="nama_penyetor" class="form-control @error('nama_penyetor') is-invalid @enderror" value="{{ old('nama_penyetor', $pemasukanIuran->nama_penyetor) }}">
                          @error('nama_penyetor')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Telp </label>
                          <input type="text" readonly name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', $pemasukanIuran->telp) }}">
                          @error('telp')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Tujuan Sumbangan</label>
                          <input type="text" readonly name="tujuan_penyetor" class="form-control @error('tujuan_penyetor') is-invalid @enderror" value="{{ old('tujuan_penyetor', $pemasukanIuran->tujuan_penyetor) }}">
                          @error('tujuan_penyetor')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Berita </label>
                          <input type="text" readonly name="berita" class="form-control @error('berita') is-invalid @enderror" value="{{ old('berita', $pemasukanIuran->berita) }}">
                          @error('berita')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Rekening Pembayaran</label>
                          <input type="text" readonly name="rekening_pembayaran" class="form-control @error('rekening_pembayaran') is-invalid @enderror" value="{{ old('rekening_pembayaran', $pemasukanIuran->rekening_pembayaran) }}">
                          @error('rekening_pembayaran')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nomor Rekening</label>
                          <input type="text" readonly name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $pemasukanIuran->nomor_rekening) }}">
                          @error('nomor_rekening')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Atas Nama</label>
                          <input type="text" readonly name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror" value="{{ old('atas_nama', $pemasukanIuran->atas_nama) }}">
                          @error('atas_nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <div><label>Slip Setoran</label></div>
                          <img class="" width="550px" height="350px" src="{{ url('/storage/assets/slip/setoran/pendapatan/'.$pemasukanIuran->picture_path_slip_pendapatan) }}">
                          @error('picture_path_slip_setoran_iuran')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>

                      <button class="mt-3 btn btn-primary">Verifikasi SPI</button>
                      <button type="button" class="mt-3 btn btn-danger" data-toggle="modal" data-target="#showIuranBaruModal">tidak sesuai</button>

                  </form>
              </div>
          </div>
      </div>
  </div>
  <!---Container Fluid-->

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
  <!-- Modal Alasan End-->
  @endsection
