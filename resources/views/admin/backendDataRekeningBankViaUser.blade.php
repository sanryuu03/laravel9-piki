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


  <div class="container-fluid landingpage-anggota">
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">NO</th>
                      <th width="0.1%">Nama Bank</th>
                      <th width="0.1%">Nomor Rekening</th>
                      <th width="1%">Atas Nama</th>
                      <th width="10px">Created At</th>
                      <th width="10px">Updated At</th>
                      <th width="10px">Post By</th>
                      <th width="10px">Edited By</th>
                      <th width="0.01%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($dataIuran as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->rekening_pembayaran }}</td>
                      <td>{{ $item->nomor_rekening }}</td>
                      <td>{{ $item->atas_nama }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->updated_at)) }} WIB</td>
                      <td>{{ $item->post_by }}</td>
                      <td>{{ $item->edited_by }}</td>
                      <td>
                          <a href="{{ route('backend.form.edit.data.rekening.bank.via.user', [$userid,$item->id]) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('destroy.data.rekening.iuran', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @endsection
