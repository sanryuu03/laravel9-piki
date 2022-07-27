  @extends('admin.layouts.mainAnggota')

  @section('menuContentAnggota')


  <style>
      .bg-gradient-primary {
          background: rgb(30, 64, 174);
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
  <div class="mt-3 container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <a href="{{ route('backend.form.add.program') }}" class="btn btn-info btn-sm">Tambah Program</a>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif


  <div class="container-fluid">

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
  @endsection
