  @extends('admin.layouts.main')

  @section('menuContent')
  <style>
  .ui-datepicker-calendar {
    display: none;
    }
    </style>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a>{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>

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
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">No</th>
                      <th width="1%">Bulan</th>
                      <th width="1%" colspan="2" class="text-center">Pemasukan</th>
                      <th width="1%" colspan="2" class="text-center">Pengeluaran</th>
                      <th width="1%">Kas</th>
                  </tr>
                  <tr>
                      <th width="0.1%"></th>
                      <th width="1%"></th>
                      <th width="1%">Nama Pemasukan</th>
                      <th width="1%">Jumlah Pemasukan</th>
                      <th width="1%">Nama Pengeluaran</th>
                      <th width="1%">Jumlah Pengeluaran</th>
                      <th width="1%"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($laporanKeuangan as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->bulan }}</td>
                      <td>{{ $item->pemasukan }}</td>
                      <td>{{ $item->pengeluaran }}</td>
                      <td>{{ $item->kas }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>

      </div>
  </div>
  <!---Container Fluid-->
  @endsection
