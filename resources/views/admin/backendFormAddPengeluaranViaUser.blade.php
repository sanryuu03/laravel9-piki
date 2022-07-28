  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <style>
      .bg-gradient-primary {
          background: #fff;
      }

      .card {
          background-color: #fff;
      }

      @media (max-width: 480px) {
          h1 {
              margin-top: 25px !important;
          }
      }


      @media (min-width: 992px) {}

  </style>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif


  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('backend.save.form.pengeluaran.rutin') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

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
              <input id="date" class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" placeholder="YYYY/MM/DD" value="{{ old('tanggal', $Pengeluaran->tanggal) }}" />
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

          <a class="mt-3 btn btn-danger" href="{{ route('backend.keuangan') }}">Back</a>
          <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
          </form>
      </div>
  </div>
  </div>
  @endsection
