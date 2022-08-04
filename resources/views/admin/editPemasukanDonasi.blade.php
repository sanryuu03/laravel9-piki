  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ route('backend.donasi.baru') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
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
                  <form method="post" action="{{ route('update.form.sumbangan.frontend', $item->id) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group jumlah-iuran">
                          <label>Jumlah Sumbangan </label>
                          <input id="uang" type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', 'Rp. '.number_format($sumbangan->jumlah,0,",",".")) }}">
                          @error('jumlah')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nama Penyumbang </label>
                          <input type="text" name="nama_penyumbang" class="form-control @error('nama_penyumbang') is-invalid @enderror" value="{{ old('nama_penyumbang', $sumbangan->nama_penyumbang) }}">
                          @error('nama_penyumbang')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Telp </label>
                          <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', $sumbangan->telp) }}">
                          @error('telp')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Tujuan Sumbangan</label>
                          {{-- <input type="text" name="tujuan_sumbangan" class="form-control @error('tujuan_sumbangan') is-invalid @enderror" value="{{ old('tujuan_sumbangan', $sumbangan->tujuan_sumbangan) }}"> --}}
                          <select class="custom-select" name="tujuan_sumbangan">
                              <option value="" selected>{{ ucwords('pilih menu navbar') }}</option>
                              @foreach($tujuanSumbangan as $tujuan)
                              <option value="{{ $tujuan->id }}" {{ $sumbangan->tujuan_sumbangan==$tujuan->id?'selected':'' }}>{{ $tujuan->nama_sub_menu }}</option>
                              @endforeach
                          </select>
                          @error('tujuan_sumbangan')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $sumbangan->email) }}">
                          @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Provinsi</label>
                          <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi', $sumbangan->provinsi) }}">
                          @error('provinsi')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Kabupaten/Kota</label>
                          <input type="text" name="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" value="{{ old('kabupaten', $sumbangan->kabupaten) }}">
                          @error('kabupaten')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Kecamatan</label>
                          <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan', $sumbangan->kecamatan) }}">
                          @error('kecamatan')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Desa/Kelurahan</label>
                          <input type="text" name="desa" class="form-control @error('desa') is-invalid @enderror" value="{{ old('desa', $sumbangan->desa) }}">
                          @error('desa')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $sumbangan->alamat) }}">
                          @error('alamat')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Berita </label>
                          <input type="text" name="berita" class="form-control @error('berita') is-invalid @enderror" value="{{ old('berita', $sumbangan->berita) }}">
                          @error('berita')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Rekening Pembayaran</label>
                          <input type="text" name="rekening_pembayaran" class="form-control @error('rekening_pembayaran') is-invalid @enderror" value="{{ old('rekening_pembayaran', $sumbangan->rekening_pembayaran) }}">
                          @error('rekening_pembayaran')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nomor Rekening</label>
                          <input type="text" name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $sumbangan->nomor_rekening) }}">
                          @error('nomor_rekening')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Atas Nama</label>
                          <input type="text" name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror" value="{{ old('atas_nama', $sumbangan->atas_nama) }}">
                          @error('atas_nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <div><label>Slip Setoran</label></div>
                          <img class="" width="550px" height="350px" src="{{ url('/storage/assets/slip/setoran/sumbangan/'.$sumbangan->picture_path_slip_setoran_sumbangan) }}">
                          <input type="file" name="picture_path_slip_setoran_sumbangan" class="form-control @error('picture_path_slip_setoran_sumbangan') is-invalid @enderror">
                          @error('picture_path_slip_setoran_iuran')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>

                      <button class="mt-3 btn btn-primary">update</button>
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
                  <form action="{{ route('backend.post.donasi.ditolak', $item->id) }}" method="post">
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
