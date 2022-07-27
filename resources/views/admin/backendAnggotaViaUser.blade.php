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
      <div class="card-body">
          <div class="mb-3 row">
              <!-- New User Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/pendaftarBaru') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="mr-2 col">
                                  <div class="mb-1 text-xs font-weight-bold text-uppercase">Pendaftar Baru</div>
                                  <div class="mb-0 mr-3 text-gray-800 h5 font-weight-bold">{{ $pendaftarBaru }}</div>
                                  <div class="mt-2 mb-0 text-xs text-muted">
                                      <span>Belum di proses</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-users fa-2x text-info"></i>
                              </div>
                          </div>
                      </div>
                      </a>
                  </div>
              </div>
              <!-- Dalam Proses Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/dalamProses') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row align-items-center">
                              <div class="mr-2 col">
                                  <div class="mb-1 text-xs font-weight-bold text-uppercase">Dalam Proses</div>
                                  <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $dalamProses }}</div>
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
                      <a href="{{  url('/admin/diTolak') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="mr-2 col">
                                  <div class="mb-1 text-xs font-weight-bold text-uppercase">Di Tolak</div>
                                  <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $diTolak }}</div>
                                  <div class="mt-2 mb-0 text-xs text-muted">
                                      <span>Verifikasi anggota gagal</span>
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
                      <a href="{{  url('/admin/landingpageanggota') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Diterima</div>
                                      <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $anggotaDiterima }}</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Anggota diterima</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-id-card fa-2x text-success"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

              <!-- Jabatan Di Piki Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/jabatanPIKISUMUT') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Jabatan Di PIKI SUMUT</div>
                                      <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $jabatanPikiSumut }}</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Jabatan Anggota diterima</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-hospital-user fa-2x text-primary"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

              <!-- Anggota Di Landing Page Piki Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/anggotaYangDitampilkan') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Anggota Di Landing Page Piki</div>
                                      <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $anggotaYangDitampilkan }}</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Anggota yang ditampilkan</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-user-graduate fa-2x text-warning"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

              <!-- Kategori Anggota Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/kategorianggota') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Kategori Anggota</div>
                                      <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $kategoriAnggota }}</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Kategori anggota</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-user-gear fa-2x text-primary"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>

              <!-- Sub Kategori Anggota Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/admin/subkategorianggota') }}" class="d-flex">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="mr-2 col">
                                      <div class="mb-1 text-xs font-weight-bold text-uppercase">Sub Kategori Anggota</div>
                                      <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $subKategoriAnggota }}</div>
                                      <div class="mt-2 mb-0 text-xs text-muted">
                                          <span>Sub kategori anggota</span>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-user-group fa-2x text-info"></i>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
</div>
  @endsection
