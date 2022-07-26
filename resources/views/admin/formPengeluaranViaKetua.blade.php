  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
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
                  <form method="post" action="{{ route('backend.post.pengeluaran.dinamis.diverifikasi.ketua', [$masterMenu,$subMenu,$item->id]) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                  <div class="form-group">
                      <label>Pos Anggaran</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $Pengeluaran->id }}">
                      <input type="text" readonly name="pos_anggaran" class="form-control @error('pos_anggaran') is-invalid @enderror" value="{{ old('pos_anggaran', $Pengeluaran->pos_anggaran) }}">
                      @error('pos_anggaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input id="date" class="form-control @error('tanggal') is-invalid @enderror" type="text" readonly name="tanggal" placeholder="YYYY/MM/DD" value="{{ old('tanggal', $Pengeluaran->tanggal) }}" />
                      @error('tanggal')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Uraian pengeluaran</label>
                      <input type="text" readonly name="uraian_pengeluaran" class="form-control @error('uraian_pengeluaran') is-invalid @enderror" value="{{ old('uraian_pengeluaran', $Pengeluaran->uraian_pengeluaran) }}">
                      @error('uraian_pengeluaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Volume</label>
                      <input id='volume' type="text" readonly name="volume" class="form-control @error('volume') is-invalid @enderror" value="{{ old('volume', $Pengeluaran->volume) }}">
                      @error('volume')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" readonly name="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan', $Pengeluaran->satuan) }}">
                      @error('satuan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Harga Satuan</label>
                      <input id='harga_satuan' type="text" readonly name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{ old('harga_satuan', $Pengeluaran->harga_satuan) }}">
                      @error('harga_satuan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Jumlah</label>
                      <input id='jumlah' readonly type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', 'Rp. '.number_format($Pengeluaran->jumlah,0,",",".")) }}">
                      @error('jumlah')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Berita</label>
                      <input type="text" readonly name="berita" class="form-control @error('berita') is-invalid @enderror" value="{{ old('berita', $Pengeluaran->berita) }}">
                      @error('berita')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                  <div>
                      <label>Bukti Pengeluaran</label>
                      </div>
                          <img class="" width="550px" height="350px" src="{{ url('/storage/assets/pengeluaran/rutin/'.$Pengeluaran->picture_path_bukti_pengeluaran_rutin) }}">
                      @error('picture_path_bukti_pengeluaran_rutin')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>

                      <button class="mt-3 btn btn-primary">Verifikasi Ketua</button>
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
                  <form action="{{ route('backend.post.pengeluaran.dinamis.ditolak', [$masterMenu,$subMenu,$item->id]) }}" method="post">
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
