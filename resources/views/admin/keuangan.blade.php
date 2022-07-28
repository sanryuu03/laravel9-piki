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
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3">{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>

  <div class="container-fluid">
      <div class="card-body">
          <div class="mb-3 row">
              <!-- Ditolak Card Example -->
              {{-- <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/laporanKeuangan') }}" class="d-flex">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="mr-2 col">
                          <div class="mb-1 text-xs font-weight-bold text-uppercase">Input Data Report</div>
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
      <div class="mb-4 col-xl-3 col-md-6">
          <div class="card h-100">
              <a href="{{  url('/admin/DataIuran') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="mr-2 col">
                              <div class="mb-1 text-xs font-weight-bold text-uppercase">Pengaturan Rekening Bank</div>
                              <div class="mt-2 mb-0 text-xs text-muted">
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
      <div class="mb-4 col-xl-3 col-md-6">
          <div class="card h-100">
              <a href="{{  url('/admin/dataBiayaIuran') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="mr-2 col">
                              <div class="mb-1 text-xs font-weight-bold text-uppercase">Pengaturan Besaran Iuran</div>
                              <div class="mt-2 mb-0 text-xs text-muted">
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
      <!-- Master Menu Navbar Pemasukan Card Example -->
      <div class="mb-4 col-xl-3 col-md-6">
          <div class="card h-100">
              <a href="{{  url('/admin/masterMenuNavbarKeuangan') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="mr-2 col">
                              <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('Master Menu Navbar') }}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>
      <!-- Sub Menu Card Example -->
      <div class="mb-4 col-xl-3 col-md-6">
          <div class="card h-100">
              <a href="{{  url('/admin/subMenuNavbarKeuangan') }}" class="d-flex">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="mr-2 col">
                              <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('Sub Menu') }}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-clipboard-list fa-2x text-info"></i>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      </div>
      {{-- <!-- Form Card Example -->
      <div class="mb-4 col-xl-3 col-md-6">
          <div class="card h-100">
              <a href="{{  url('/admin/customForm') }}" class="d-flex">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="mr-2 col">
                  <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('custom form') }}</div>
              </div>
              <div class="col-auto">
                  <i class="fas fa-table-list fa-2x text-info"></i>
              </div>
          </div>
      </div>
      </a>
  </div>
  </div> --}}
  {{-- <!-- Master Pos Anggaran Rutin Card Example -->
      <div class="mb-4 col-xl-3 col-md-6">
          <div class="card h-100">
              <a href="{{  url('/admin/posAngaran') }}" class="d-flex">
  <div class="card-body">
      <div class="row no-gutters align-items-center">
          <div class="mr-2 col">
              <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('Master Pos Anggaran') }}</div>
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
  <div class="mb-4 col-xl-3 col-md-6">
      <div class="card h-100">
          <a href="{{  url('/admin/namaKegiatan') }}" class="d-flex">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="mr-2 col">
                          <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('Nama Kegiatan') }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-info"></i>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  </div> --}}
  <!-- Tambah Pemasukan Card Example -->
  <div class="mb-4 col-xl-3 col-md-6">
      <div class="card h-100">
          <a href="{{  url('/admin/formInput') }}" class="d-flex">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="mr-2 col">
                          <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('Input Pemasukan') }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-file-invoice-dollar fa-2x text-success"></i>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  </div>
  <!-- Tambah Pengeluaran Card Example -->
  <div class="mb-4 col-xl-3 col-md-6">
      <div class="card h-100">
          <a href="{{  url('/admin/formAddPengeluaran') }}" class="d-flex">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="mr-2 col">
                          <div class="mb-1 text-xs font-weight-bold text-uppercase">{{ ucwords('Input Pengeluaran') }}</div>
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
