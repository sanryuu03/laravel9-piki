  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
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
              <form method="post" action="{{ route('backend.save.tambah.admin') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Pos Anggaran</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $creator }}">
                      <input type="hidden" name="users_id" class="form-control" value="{{ $userDiterima->users_id }}">
                      <input type="text" readonly name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $userDiterima->name) }}">
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group jumlah-iuran">
                      <label>Gender <span class="text-danger">*</span></label>
                      <input type="text" readonly name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender', $userDiterima->userPiki->gender) }}">
                      @error('gender')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Phone Number <span class="text-danger">*</span></label>
                      <input type="text" readonly name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $userDiterima->phone_number) }}">
                      @error('phone_number')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" readonly name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $userDiterima->userPiki->email) }}">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Hak Akses</label><br>
                      <input type="checkbox" id="hakAkses1" name="hakAkses[]" value="header">
                      <label for="hakAkses1"> Header</label><br>
                      <input type="checkbox" id="hakAkses2" name="hakAkses[]" value="berita">
                      <label for="hakAkses2"> Berita</label><br>
                      <input type="checkbox" id="hakAkses3" name="hakAkses[]" value="program">
                      <label for="hakAkses3"> Program</label><br>
                      <input type="checkbox" id="hakAkses4" name="hakAkses[]" value="agenda">
                      <label for="hakAkses4"> Agenda</label><br>
                      <input type="checkbox" id="hakAkses5" name="hakAkses[]" value="anggota">
                      <label for="hakAkses5"> Anggota</label><br>
                      <input type="checkbox" id="hakAkses6" name="hakAkses[]" value="community partners">
                      <label for="hakAkses6"> Community Partners</label><br>
                      <input type="checkbox" id="hakAkses7" name="hakAkses[]" value="keuangan">
                      <label for="hakAkses7"> Keuangan</label><br>
                      <input type="checkbox" id="hakAkses8" name="hakAkses[]" value="keuangan-pengaturan rekening bank">
                      <label for="hakAkses8"> keuangan: pengaturan rekening bank</label><br>
                      <input type="checkbox" id="hakAkses9" name="hakAkses[]" value="keuangan-pengaturan besaran iuran">
                      <label for="hakAkses9"> keuangan: pengaturan besaran iuran</label><br>
                      <input type="checkbox" id="hakAkses10" name="hakAkses[]" value="keuangan-pengaturan master menu dan sub menu">
                      <label for="hakAkses10"> keuangan: pengaturan master menu dan sub menu</label><br>
                      <input type="checkbox" id="hakAkses11" name="hakAkses[]" value="keuangan-pengaturan form input pemasukan">
                      <label for="hakAkses11"> keuangan: pengaturan form input pemasukan</label><br>
                      <input type="checkbox" id="hakAkses12" name="hakAkses[]" value="keuangan-pengaturan form input pengeluaran">
                      <label for="hakAkses12"> keuangan: pengaturan form input pengeluaran</label><br>
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

                  <a class="mt-3 btn btn-danger" href="{{ route('backend.super.admin') }}">Back</a>
                  <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
