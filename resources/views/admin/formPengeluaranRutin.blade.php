  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->

  <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
      }

  </style>
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a>{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="mt-5 alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('backend.save.form.pengeluaran.rutin') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  {{-- <div class="form-group">
                      <label>Pos Anggaran</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $Pengeluaran->id }}">
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
          </div> --}}
          <div class="form-group">
              <label>Jenis Pengeluaran</label>
              <input type="hidden" name="id" class="form-control" value="{{ $Pengeluaran->id }}">
              <select class="custom-select" name="pos_anggarans_id" id='sub_menu_navbar_keuangans_id'>
                  <option selected>Pilih Jenis Pengeluaran</option>
                  @foreach($jenisPengeluaran as $pengeluaran)
                  @if(old('sub_menu_navbar_keuangans_id') == $pengeluaran->id)
                  <option value="{{ $pengeluaran->id }}" selected>{{ $pengeluaran->nama_sub_menu }}</option>
                  @else
                  <option value="{{ $pengeluaran->id }}">{{ $pengeluaran->nama_sub_menu }}</option>
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
              <label>Tanggal</label>
              <input id="date" class="form-control @error('tanggal') is-invalid @enderror" type="text" name="tanggal" placeholder="YYYY/MM/DD" value="{{ old('tanggal', $Pengeluaran->tanggal) }}" />
              @error('tanggal')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              <label>Uraian pengeluaran</label>
              <input type="text" name="uraian_pengeluaran" class="form-control @error('uraian_pengeluaran') is-invalid @enderror" value="{{ old('uraian_pengeluaran', $Pengeluaran->uraian_pengeluaran) }}">
              @error('uraian_pengeluaran')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              <label>Volume</label>
              <input id='volume' type="text" name="volume" class="form-control @error('volume') is-invalid @enderror" value="{{ old('volume', $Pengeluaran->volume) }}">
              @error('volume')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              <label>Satuan</label>
              <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan', $Pengeluaran->satuan) }}">
              @error('satuan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              <label>Harga Satuan</label>
              <input id='harga_satuan' type="text" name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{ old('harga_satuan', $Pengeluaran->harga_satuan) }}">
              @error('harga_satuan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              <label>Jumlah</label>
              <input id='jumlah' readonly type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $Pengeluaran->jumlah) }}">
              @error('jumlah')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              <label>Berita</label>
              <input type="text" name="berita" class="form-control @error('berita') is-invalid @enderror" value="{{ old('berita', $Pengeluaran->berita) }}">
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

          <a class="mt-3 btn btn-danger" href="{{ route('kategori.anggota') }}">Back</a>
          <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
          </form>
      </div>
  </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
