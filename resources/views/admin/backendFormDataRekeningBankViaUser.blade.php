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
              <form method="post" action="{{ route('save.form.data.rekening.iuran') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Nama Bank</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $dataIuran->id }}">
                      <input id="title" type="text" name="rekening_pembayaran" class="form-control @error('rekening_pembayaran') is-invalid @enderror" value="{{ old('rekening_pembayaran', $dataIuran->rekening_pembayaran) }}">
                      @error('rekening_pembayaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nomor Rekening</label>
                      <input id="title" type="text" name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $dataIuran->nomor_rekening) }}">
                      @error('nomor_rekening')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Atas Nama</label>
                      <input id="title" type="text" name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror" value="{{ old('atas_nama', $dataIuran->atas_nama) }}">
                      @error('atas_nama')
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

                  <a class="mt-3 btn btn-danger" href="{{ route('backend.data.iuran') }}">Back</a>
                  <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  @endsection
