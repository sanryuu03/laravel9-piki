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
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif
  <div class="container-fluid">
      <div class="card mx-3 my-3">
          <div class="card-body">
              <div class="container-fluid">
                  <form method="post" action="{{ route('save.form.iuran', $item->id) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  Jenis Setoran:
                                  <select id="filter-jenis-setoran" class="custom-select filter-jenis-setoran" name="jenis_setoran">
                                      <option value="">All</option>
                                      @foreach ($jenisPemasukan as $pemasukan)
                                      <option value="{{ $pemasukan->id }}">{{ $pemasukan->jenis_pemasukan }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                  <div id="iuran-bulan" class="form-group d-none">
                      <label>Iuran Bulan <span class="font-weight-bold text-danger">*</span></label>
                      <div>
                          <label><span class="font-weight-bold text-danger">Rp. {{ number_format($dataBiayaIuran->biaya_iuran,0,",",".") }}/Bulan *</span></label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox1" onclick="UpdateCost()" value="Januari">
                          <label class="form-check-label" for="inlineCheckbox1">Januari</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox2" onclick="UpdateCost()" value="Februari">
                          <label class="form-check-label" for="inlineCheckbox2">Februari</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox3" onclick="UpdateCost()" value="Maret">
                          <label class="form-check-label" for="inlineCheckbox3">Maret</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox4" onclick="UpdateCost()" value="April">
                          <label class="form-check-label" for="inlineCheckbox4">April</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox5" onclick="UpdateCost()" value="Mei">
                          <label class="form-check-label" for="inlineCheckbox5">Mei</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox6" onclick="UpdateCost()" value="Juni">
                          <label class="form-check-label" for="inlineCheckbox6">Juni</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox7" onclick="UpdateCost()" value="Juli">
                          <label class="form-check-label" for="inlineCheckbox7">Juli</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox8" onclick="UpdateCost()" value="Agustus">
                          <label class="form-check-label" for="inlineCheckbox8">Agustus</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox9" onclick="UpdateCost()" value="September">
                          <label class="form-check-label" for="inlineCheckbox9">September</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox10" onclick="UpdateCost()" value="Oktober">
                          <label class="form-check-label" for="inlineCheckbox10">Oktober</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox11" onclick="UpdateCost()" value="November">
                          <label class="form-check-label" for="inlineCheckbox11">November</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bulan[]" type="checkbox" id="inlineCheckbox12" onclick="UpdateCost()" value="Desember">
                          <label class="form-check-label" for="inlineCheckbox12">Desember</label>
                      </div>
                      @error('iuran_bulan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                      <div id='jumlah' class="form-group jumlah-iuran d-none">
                          <label>Jumlah <span class="text-danger">*</span></label>
                          <input id="uang" type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}">
                          @error('jumlah')
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
                          <input type="file" name="picture_path_slip_setoran_iuran" class="form-control @error('picture_path_slip_setoran_iuran') is-invalid @enderror">
                          @error('picture_path_slip_setoran_iuran')
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
  <script>
      var dataBiayaIuran = @json($dataBiayaIuran -> biaya_iuran);

      UpdateCost = function() {
          var sum = 0;
          var gn, elem;
          for (i = 1; i <= 12; i++) {
              gn = 'inlineCheckbox' + i;
              elem = document.getElementById(gn);
  const element = elem["inlineCheckbox1"];
              if (elem.checked == true) {
                  sum += Number(1);
              }
          }
          document.getElementById('uang').value = sum.toFixed(2) * dataBiayaIuran;
      }

  </script>
  @endsection
