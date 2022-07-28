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


  <div class="container-fluid">
      <div class="card-body">
          <form class="mb-1" action="{{ route('table.export') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-md-4">
                      Pos Anggaran:
                      <select class="custom-select" name="pos_anggarans_id" id='pos-anggaran'>
                          <option selected>Pilih Pos Anggaran</option>
                          @foreach($posAnggaran as $pos)
                          @if(old('pos_anggarans_id') == $pos->id)
                          <option value="{{ $pos->id }}" selected>{{ $pos->nama_pos_anggaran }}</option>
                          @else
                          <option value="{{ $pos->id }}">{{ $pos->nama_pos_anggaran }}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <label>Nama Kegiatan</label>
                      <select class="custom-select" name="nama_kegiatan" id="nama_kegiatan">
                          <option selected>Pilih Nama Kegiatan</option>
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-1" for="start">
                      Bulan:
                  </div>
                  <div class="col-md-3">
                      <input class="form-control" type="month" id="start" min="2022-01" value="2022-07" name="bulan" placeholder="pilih Bulan" value="" />
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-1">
                      Uraian:
                  </div>
                  <div class="col-md-3">
                      <input id="uraian" class="form-control" type="text" name="uraian" placeholder="cari uraian" value="" />
                  </div>
              </div>
              {{-- <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-info">Print Table</button>
                  </div>
              </div> --}}
          </form>
          <div class='row'>
              <div class='col-md-6'>
                  <table class="table table-bordered table-striped table-anggota">
                      <thead>
                          <tr>
                              <th width="0.1%">No</th>
                              <th width="1%">Bulan</th>
                              <th width="1%" colspan="2" class="text-center">Pemasukan</th>
                          </tr>
                          <tr>
                              <th width="0.1%"></th>
                              <th width="1%"></th>
                              <th width="1%">Nama Pemasukan</th>
                              <th width="1%">Jumlah Pemasukan</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php
                            $totalPemasukan=0;$totalPengeluaran=0;
                        @endphp
                          @foreach($pendapatan as $pemasukan)
                          @if ($pemasukan->jenis_setoran=='sumbangan')
                          @php
                          $pemasukan->sum += $sumbangan;
                          @endphp
                          @endif
                          @php $totalPemasukan += $pemasukan->sum; @endphp
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ date('F', strtotime($pemasukan->tanggal)) }}</td>
                              {{-- <td>{{ $pemasukan->tanggal }}</td> --}}
                              <td>{{ $pemasukan->jenis_pendapatan }}</td>
                              <td>{{ 'Rp. '.number_format($pemasukan->sum,0,",",".") }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <div class='col-md-6'>
                  <table class="table table-bordered table-striped table-anggota">
                      <thead>
                          <tr>
                              <th width="0.1%">No</th>
                              <th width="1%" colspan="2" class="text-center">Pengeluaran</th>
                              <th width="0.1%">Kas</th>
                          </tr>
                          <tr>
                              <th width="0.1%"></th>
                              <th width="1%">Nama Pengeluaran</th>
                              <th width="1%">Jumlah Pengeluaran</th>
                              <th width="1%"></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($Pengeluaran as $pengeluaran)
                          @php $totalPengeluaran += $pengeluaran->sum; @endphp
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $pengeluaran->pos_anggaran }}</td>
                              <td>{{ 'Rp. '.number_format($pengeluaran->sum,0,",",".") }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
                    <table class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="34%" class="text-center">Total Pendapatan</th>
                      <td width="10%" class="text-center">{{ 'Rp. '.number_format($totalPemasukan,0,",",".") }}</th>
                      <th width="25%" class="text-center">Total Pengeluaran</th>
                      <td width="25%" class="text-center">{{ 'Rp. '.number_format($totalPengeluaran,0,",",".") }}</th>
                  </tr>
                  <tr>
                      <th width="32%" class="text-center">{{ ucwords('sisa kas') }}</th>
                      <th width="10%" class="text-center">{{ 'Rp. '.number_format($totalPemasukan-$totalPengeluaran,0,",",".") }}</th>

                  </tr>
              </thead>
          </table>

      </div>
  </div>
  @endsection
