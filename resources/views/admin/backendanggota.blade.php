  @extends('admin.layouts.main')

  @section('menuContent')
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
  .<div class="container-fluid">
      <div class="card-body">
          <div class="row mb-3">
              <!-- New User Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Pendaftar Baru</div>
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
                                  <div class="mt-2 mb-0 text-muted text-xs">
                                      <span>Belum di proses</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-users fa-2x text-info"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <div class="card-body">
                          <div class="row align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Dalam Proses</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                                  <div class="mt-2 mb-0 text-muted text-xs">
                                      <span>Sedang di verifikasi</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-tasks fa-2x text-primary"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Earnings (Annual) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Di Tolak</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
                                  <div class="mt-2 mb-0 text-muted text-xs">
                                      <span>Verifikasi anggota gagal</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-user-times fa-2x text-success"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/admin/landingpageanggota') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Diterima</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                      <div class="mt-2 mb-0 text-muted text-xs">
                                          <span>Anggota diterima</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-id-card fa-2x text-warning"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>

      <!---Container Fluid-->
      @endsection