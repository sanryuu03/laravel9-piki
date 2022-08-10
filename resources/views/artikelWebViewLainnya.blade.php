  @extends('layouts.main')

  @section('menuContent')
  <style>
      .list-kategori-berita h1 {
          margin-top: 70px !important;
          padding-top: 15px !important;
          padding-bottom: 20px !important;
          margin-left: 0px !important;
          margin-right: 0px !important;
          text-align: center;
          font-weight: 400;
          font-size: 25px !important;
          width: 100% !important;
          /* background-color: #f7f7f7; */
          background-color: #61c7ff;
      }

  </style>

  <!-- Kategory Berita PIKI Terbaru Start-->
  <div class="p-0 container-fluid list-kategori-berita">
      <h1 class="mb-3 text-center fs-1">{{ ucwords('artikel lainnya') }}</h1>
  </div>
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <table id="table_id" class="table table-bordered table-striped table-anggota">
                  <thead>
                      <tr>
                          <th width="1%">{{ ucwords('judul') }}</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($sponsorPiki as $sponsor)
                      <tr>
                          <td>
                          <a href="{{ route('read.more.artikel.web.view', $sponsor->judul) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                          {{ $sponsor->judul }}</a>
                          <em>{{ $sponsor->penulis }}</em>
                          </td>
                          @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- Kategory Berita PIKI Terbaru End-->
  @endsection
