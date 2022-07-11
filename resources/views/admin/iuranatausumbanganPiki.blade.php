  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <!-- Kategory Berita Start-->
  <style>
      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {}

  </style>
  <h1 class="pt-5 mb-3 text-center fs-3">Iuran / Sumbangan</h1>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif
  <div class="container-fluid">
      <div class="card mx-3 my-3">
          <div class="card-body">
              <div class="container-fluid">
                  <form method="post" action="{{ route('save.form.sumbangan.frontend', $item->id) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-4">
                                  Jenis Setoran:
                                  <select id="table-filter-jenis-pemasukan" class="custom-select table-filter-jenis-pemasukan" name="jenis-pemasukan">
                                      <option value="">All</option>
                                      @foreach ($jenisPemasukan as $pemasukan)
                                      <option value="{{ $pemasukan->id }}">{{ $pemasukan->jenis_pemasukan }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Iuran Bulan <span class="text-danger">*</span></label>
                          <input id="uang" type="text" name="jumlah_sumbangan" class="form-control @error('jumlah_sumbangan') is-invalid @enderror" value="{{ old('jumlah_sumbangan') }}">
                          @error('jumlah_sumbangan')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Jumlah Iuran/Sumbangan <span class="text-danger">*</span></label>
                          <input id="uang" type="text" name="jumlah_sumbangan" class="form-control @error('jumlah_sumbangan') is-invalid @enderror" value="{{ old('jumlah_sumbangan') }}">
                          @error('jumlah_sumbangan')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Nama Penyumbang <span class="text-danger">*</span></label>
                          <input type="text" readonly name="nama_penyumbang" class="form-control @error('nama_penyumbang') is-invalid @enderror" value="{{ old('nama_penyumbang', $anggotaPiki->name) }}">
                          @error('nama_penyumbang')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Telp <span class="text-danger">*</span></label>
                          <input type="text" readonly name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', $anggotaPiki->phone_number) }}">
                          @error('telp')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Tujuan Sumbangan</label>
                          <input type="text" name="tujuan_sumbangan" class="form-control @error('tujuan_sumbangan') is-invalid @enderror" value="{{ old('tujuan_sumbangan') }}">
                          @error('tujuan_sumbangan')
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
