  @extends('admin.layouts.main')

  @section('menuContent')
  <style>
      @media (max-width: 575.98px) {
          .silang {
              position: absolute;
              top: -40px !important;
              right: 0;
          }
      }

      @media (min-width: 992px) {
          .silang {
              position: absolute;
              top: 0;
              right: 0;
          }
      }

  </style>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ route('backendanggota') }}" class="fas fa-arrow-circle-left text-danger"></a> {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> {{ $menu }}</li>
          </ol>
      </div>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('error'))
  <div class="alert alert-danger" role="alert">
      {{ session('error') }}
  </div>
  @endif
  .<div class="container-fluid landingpage-anggota">
      <div class="row">
          <div class="col-md-4">
              <a href="{{ route('pilih.anggota.yang.ditampilkan') }}" class="mb-1 btn btn-warning btn-sm">Pilih Anggota</a>
          </div>
      </div>
      <div class="card-body">
          @foreach($anggota as $item)
          <div class="mb-3 card" style="max-width: 540px;">
              <div class="row g-0">
                  <div class="col-md-4">
                      <img src="{{ url('storage/assets/user/profile/'.$item->userPiki->photo_profile) }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title">{{ $item->name }}</h5>
                          <p class="card-text">{{ $item->jabatan_piki_sumut }}</p>
                          <p class="card-text">{{ $item->job }}</p>
                          <p class="card-text"><small class="text-muted">{{ date('d-M-Y', strtotime($item->created_at)) }}</small></p>
                      </div>
                      <form action="{{ route('hapus.anggota.yang.ditampilkan', $item->id) }}" method="POST" class="silang">
                          @method('post')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                              <i class="fa-solid fa-circle-xmark"></i>
                          </button>
                      </form>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
  <!---Container Fluid-->

  @endsection
