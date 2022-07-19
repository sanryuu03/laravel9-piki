  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->

  <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
      }

  </style>
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a>{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success mt-5" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="card mx-3 my-3">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('backend.save.form.pengeluaran.rutin') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Pos Anggaran</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $pengeluaranRutin->id }}">
                      <select class="custom-select" name="pos_anggarans_id" id='pos-anggaran'>
                          <option selected>Pilih Pos Anggaran</option>
                          @foreach($posAnggaran as $pos)
                          @if(old('pos_anggarans_id') == $pos->id)
                          <option value="{{ $pos->id }}" selected>{{ $pos->nama_pos_anggaran }}</option>
                          @else
                          <option value="{{ $pos->id }}">{{ $pos->nama_pos_anggaran }}</option>
                          @endif
                          @endforeach
                      </select>
                      @error('pos_anggaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nama Kegiatan</label>
                      <select class="custom-select" name="nama_kegiatan" id="nama_kegiatan">
                          <option selected>Pilih Nama Kegiatan</option>
                      </select>
                      @error('nama_kegiatan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input id="date" class="form-control @error('tanggal') is-invalid @enderror" type="text" name="tanggal" placeholder="YYYY/MM/DD" value="{{ old('tanggal', $pengeluaranRutin->tanggal) }}" />
                      @error('tanggal')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Uraian pengeluaran</label>
                      <input type="text" name="uraian_pengeluaran" class="form-control @error('uraian_pengeluaran') is-invalid @enderror" value="{{ old('uraian_pengeluaran', $pengeluaranRutin->uraian_pengeluaran) }}">
                      @error('uraian_pengeluaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Volume</label>
                      <input id='volume' type="text" name="volume" class="form-control @error('volume') is-invalid @enderror" value="{{ old('volume', $pengeluaranRutin->volume) }}">
                      @error('volume')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan', $pengeluaranRutin->satuan) }}">
                      @error('satuan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Harga Satuan</label>
                      <input id='harga_satuan' type="text" name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{ old('harga_satuan', $pengeluaranRutin->harga_satuan) }}">
                      @error('harga_satuan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Jumlah</label>
                      <input id='jumlah' readonly type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $pengeluaranRutin->jumlah) }}">
                      @error('jumlah')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Berita</label>
                      <input type="text" name="berita" class="form-control @error('berita') is-invalid @enderror" value="{{ old('berita', $pengeluaranRutin->berita) }}">
                      @error('berita')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Bukti Pengeluaran <span class="text-danger">(Gambar Maksimal 2MB) *</span></label>
                      <input type="file" name="picture_path_bukti_pengeluaran_rutin" class="form-control @error('picture_path_bukti_pengeluaran_rutin') is-invalid @enderror">
                      @error('picture_path_bukti_pengeluaran_rutin')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      @if($action == "add")
                      <label>Di Posting Oleh</label>
                      <input type="text" readonly name="post_by" class="form-control" value="{{ old('post_by', $namaUser) }}">
                      @else
                      <label>Di Edit Oleh</label>
                      <input type="text" readonly name="edited_by" class="form-control" value="{{ old('edited_by', $namaUser) }}">
                      @endif
                  </div>

                  <a class="btn btn-danger mt-3" href="{{ route('kategori.anggota') }}">Back</a>
                  <button type="submit" class="btn btn-primary mt-3" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
