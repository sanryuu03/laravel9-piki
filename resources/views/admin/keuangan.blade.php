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
              <!-- New User Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanKeuangan') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pemasukan</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-money-bill-trend-up fa-2x text-info"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- Dalam Proses Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pengeluaranKeuangan') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pengeluaran</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-hand-holding-dollar fa-2x text-primary"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- Ditolak Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/laporanKeuangan') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Laporan Keuangan</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-file-invoice-dollar fa-2x text-danger"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

          </div>
      </div>
  </div>
  <!---Container Fluid-->
  @endsection
