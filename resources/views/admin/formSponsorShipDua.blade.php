  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->

  <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
      }

  </style>
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3"><a href="{{ url()->previous() }}" class="fas fa-arrow-circle-left text-danger"></a>{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="mt-5 alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('sponsorShipDua.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>{{ ucwords('foto flyer') }}</label>
                    <input type="hidden" name="id" class="form-control" value="{{ $sponsorShipDua->id ?? '' }}">
                    @if($sponsorShipDua->picture_path ?? '')
                    <div></div><img width="150px" src="{{ url('/storage/assets/sponsorshipdua/'.$sponsorShipDua->picture_path) }}"></div>
                  @endif
                  <input type="file" name="picture_path" class="form-control">
          </div>
          <div class="form-group">
              <label>{{ ucwords('link web') }}</label>
              <input type="text" name="link_web" class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web',$sponsorShipDua->link_web ?? '') }}">
              @error('link_web')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="form-group">
              @if($action == "add")
              <label>Di Posting Oleh</label>
              <input type="text" readonly name="post_by" class="form-control" value="{{ old('post_by', $namaUser) }}">
              @else
              <label>Di Edit Oleh</label>
              <input type="text" readonly name="edited_by" class="form-control" value="{{ old('edited_by', $namaUser) }}">
              @endif
          </div>

          <a class="mt-3 btn btn-danger" href="{{ route('partnerShip.index') }}">Back</a>
          <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
          </form>
      </div>
  </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
