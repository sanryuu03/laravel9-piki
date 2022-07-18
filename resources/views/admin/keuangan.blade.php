  @extends('admin.layouts.main')

  @section('menuContent')
  {{-- /**
  <style>
li.dropdown-submenu2:hover > .dropdown-menu {
    display: block;
}
  </style>
  */ --}}
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>

  <div class="container-fluid">
      <div class="card-body">
          <div class="row mb-3">
              <!-- Ditolak Card Example -->
              {{-- <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/laporanKeuangan') }}" class="d-flex">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-uppercase mb-1">Input Data Report</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-file-invoice-dollar fa-2x text-danger"></i>
                      </div>
                  </div>
              </div>
              </a>
          </div>
      </div> --}}

      <!-- Data Iuran Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
              <a href="{{  url('/admin/DataIuran') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaturan Rekening Bank</div>
                              <div class="mt-2 mb-0 text-muted text-xs">
                                  <span>Data bank iuran</span>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-building-columns fa-2x text-success"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>

      <!-- Data Biaya Iuran Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
              <a href="{{  url('/admin/dataBiayaIuran') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaturan Besaran Biaya Iuran</div>
                              <div class="mt-2 mb-0 text-muted text-xs">
                                  <span>Data biaya iuran</span>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>

      @if(auth()->user()->level=='super-admin' || auth()->user()->level=='bendahara')
      <!-- Master Pos Anggaran Rutin Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
              <a href="{{  url('/admin/posAngaran') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Master Pos Anggaran</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>
      <!-- Nama Kegiatan Rutin Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
              <a href="{{  url('/admin/namaKegiatan') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Nama Kegiatan</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-clipboard-list fa-2x text-info"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>
      <!-- Tambah Pengeluaran Rutin Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100">
              <a href="{{  url('/admin/formAddPengeluaranRutin') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">Tambah Pengeluaran Rutin</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-file-invoice-dollar fa-2x text-warning"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>
      @endif
  </div>
  </div>
  </div>
  <!---Container Fluid-->
  @endsection
