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
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('unapproved'))
  <div class="alert alert-danger" role="alert">
      {{ session('unapproved') }}
  </div>
  @endif


  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('communitypartners.update', $sponsorPiki->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                  <div class="form-group">
                      <label>Foto Community Partners</label>
                      <input type="file" name="picture_path" class="form-control" value="{{ old(url('/storage/assets/sponsor/'.$sponsorPiki->picture_path)) }}">
                  </div>
                  <div class="form-group">
                      <label>Keterangan Community Partners</label>
                      <input id="body" type="hidden" name="konten_sponsor" value={{ old('konten_sponsor') }}>
                      <trix-editor input="body">{!! $sponsorPiki->konten_sponsor !!}</trix-editor>
                  </div>

                  <button type="submit" class="mt-3 btn btn-primary">Update</button>
                  <button href="{{ route('communitypartners') }}" type="submit" class="block mt-3 btn btn-danger">Back</button>
              </form>
          </div>
      </div>
  </div>
  @endsection
