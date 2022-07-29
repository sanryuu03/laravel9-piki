  @extends('layouts.main')

  @section('menuContent')


  <!-- Kategory Berita Start-->
  <style>
      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {}

  </style>
  <h1 class="pt-5 mb-3 text-center fs-3">Sumbangan</h1>
    @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif
  <div class="container-fluid">
      <div class="card mx-3 my-3">
          <div class="card-body">
              <div class="container-fluid">
                  <form method="post" action="{{ route('save.form.sumbangan.frontend') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label>Jumlah Sumbangan <span class="text-danger">*</span></label>
                          <input id="uang" type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}">
                          @error('jumlah')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nama Penyumbang <span class="text-danger">*</span></label>
                          <input type="text" name="nama_penyetor" class="form-control @error('nama_penyetor') is-invalid @enderror" value="{{ old('nama_penyetor') }}">
                          @error('nama_penyetor')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Telp <span class="text-danger">*</span></label>
                          <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}">
                          @error('telp')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Tujuan Sumbangan</label>
                          <input type="text" name="tujuan_penyetor" class="form-control @error('tujuan_penyetor') is-invalid @enderror" value="{{ old('tujuan_penyetor') }}">
                          @error('tujuan_penyetor')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                          @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Provinsi</label>
                          <select class="form-select" name="provinsi" id="provinsi">
                              <option selected>Pilih Provinsi Anda</option>
                              @foreach ($provinces as $provinsi)
                              <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Kabupaten / Kota</label>
                          <select class="form-select" name="kota" id="kota">
                              <option selected>Pilih Kabupaten / Kota Anda</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Kecamatan</label>
                          <select class="form-select" name="kecamatan" id="kecamatan">
                              <option selected>Pilih Kecamatan Anda</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <div class="mb-3">
                              <label>Desa / Kelurahan</label>
                              <select class="form-select" name="desa" id="desa">
                                  <option selected>Pilih Desa / Kelurahan Anda</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                          @error('alamat')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Berita <span class="text-danger">*</span></label>
                          <input type="text" name="berita" class="form-control @error('berita') is-invalid @enderror" value="{{ old('berita') }}">
                          @error('berita')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Rekening Pembayaran</label>
                          <input type="text" readonly name="rekening_pembayaran" class="form-control @error('rekening_pembayaran') is-invalid @enderror" value="{{ old('rekening_pembayaran', $dataRekening->rekening_pembayaran) }}">
                          @error('rekening_pembayaran')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nomor Rekening</label>
                          <input type="text" readonly name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $dataRekening->nomor_rekening) }}">
                          @error('nomor_rekening')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Atas Nama</label>
                          <input type="text" readonly name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror" value="{{ old('atas_nama', $dataRekening->atas_nama) }}">
                          @error('atas_nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Slip Setoran <span class="font-weight-bold text-danger">* (Ukuran Gambar max 2MB)</span></label>
                          <input type="file" name="picture_path_slip_setoran_sumbangan" class="form-control @error('picture_path_slip_setoran_sumbangan') is-invalid @enderror">
                          @error('picture_path_slip_setoran_sumbangan')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>

                      <button class="btn btn-primary mt-3">Save</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Kategory Berita End-->



  @endsection
