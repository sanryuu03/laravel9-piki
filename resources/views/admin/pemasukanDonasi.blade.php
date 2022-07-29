  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->

  <div class="container-fluid">
      <div class="card-body">
          <div class="mb-3 row">
              <!-- New User Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanDonasiBaru') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">baru</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Belum di proses</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-money-bill-wave fa-2x text-info"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- Dalam Proses Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanDonasiDiproses') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">diproses</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Sedang di verifikasi</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-tasks fa-2x text-primary"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- Ditolak Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanDonasiDitolak') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">ditolak</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Verifikasi gagal</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-user-times fa-2x text-danger"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

              <!-- Diterima Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pemasukanDonasiDiterima') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">terverifikasi</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Sumbangan diterima</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-file-circle-check fa-2x text-success"></i>
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
