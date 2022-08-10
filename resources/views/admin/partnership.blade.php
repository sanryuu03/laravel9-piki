  @extends('admin.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3">Landing Page {{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Landing Page {{ $menu }}</li>
          </ol>
      </div>
      @if(session()->has('success'))
      <div class="mt-5 alert alert-success" role="alert">
          {{ session('success') }}
      </div>
      @endif
      <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{ ucwords('sponsorship') }}</button>
              <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{ ucwords('partnership') }}</button>
          </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <!-- SponsorShip Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('sponsorShipSatu.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('foto flyer sponsor ship 1') }}</label>
                                  <input type="file" name="picture_path" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('link web') }}</label>
                                  <input type="text" name="link_web" class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web') }}">
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

                              <a class="mt-3 btn btn-danger" href="{{ route('backend.keuangan') }}">Back</a>
                              <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- SponsorShip End-->
              <!-- SponsorShip Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('sponsorShipDua.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('foto flyer sponsor ship 2') }}</label>
                                  <input type="file" name="picture_path" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('link web') }}</label>
                                  <input type="text" name="link_web" class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web') }}">
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

                              <a class="mt-3 btn btn-danger" href="{{ route('backend.keuangan') }}">Back</a>
                              <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- SponsorShip End-->
              <!-- SponsorShip Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('sponsorShipTiga.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('foto flyer sponsor ship 3') }}</label>
                                  <input type="file" name="picture_path" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('link web') }}</label>
                                  <input type="text" name="link_web" class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web') }}">
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

                              <a class="mt-3 btn btn-danger" href="{{ route('backend.keuangan') }}">Back</a>
                              <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- SponsorShip End-->
              <!--Table SponsorShip Start-->
              <div class="container-fluid">
                  <div class="card-body table-responsive">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="1px">{{ ucwords('sponsor ship') }}</th>
                                  <th width="1px">{{ ucwords('foto gambar') }}</th>
                                  <th width="1px">{{ ucwords('link web') }}</th>
                                  <th width="1px">Created At</th>
                                  <th width="1px">Updated At</th>
                                  <th width="0.01%">OPSI</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>{{ ucwords('sponsor ship satu') }}</td>
                                  @if($sponsorShipSatu->picture_path ?? '')
                                  <td><img width="150px" src="{{ url('/storage/assets/sponsorshipsatu/'.$sponsorShipSatu->picture_path) }}"></td>
                                  @else
                                  <td></td>
                                  @endif
                                  <td>{{ $sponsorShipSatu->link_web ?? '' }}</td>
                                  <td>{{ $sponsorShipSatu->created_at ?? '' }}</td>
                                  <td>{{ $sponsorShipSatu->updated_at ?? '' }}</td>
                                  @if($sponsorShipSatu != null)
                                  <td>
                                      <a href="{{ route('sponsorShipSatu.edit', $sponsorShipSatu->id ?? '') }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('sponsorShipSatu.destroy', $sponsorShipSatu->id ?? '') }}" method="POST" class="d-inline">
                                          {!! method_field('delete') . csrf_field() !!}
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                              <i class="fa-solid fa-trash-can"></i>
                                          </button>
                                      </form>
                                  </td>
                                  @else
                                  <td></td>
                                  @endif
                              </tr>
                              <tr>
                                  <td>{{ ucwords('sponsor ship dua') }}</td>
                                  @if($sponsorShipDua->picture_path ?? '')
                                  <td><img width="150px" src="{{ url('/storage/assets/sponsorshipdua/'.$sponsorShipDua->picture_path) }}"></td>
                                  @else
                                  <td></td>
                                  @endif
                                  <td>{{ $sponsorShipDua->link_web ?? '' }}</td>
                                  <td>{{ $sponsorShipDua->created_at ?? '' }}</td>
                                  <td>{{ $sponsorShipDua->updated_at ?? '' }}</td>
                                  @if($sponsorShipDua != null)
                                  <td>
                                      <a href="{{ route('sponsorShipDua.edit', $sponsorShipDua->id ?? '') }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('sponsorShipDua.destroy', $sponsorShipDua->id ?? '') }}" method="POST" class="d-inline">
                                          {!! method_field('delete') . csrf_field() !!}
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                              <i class="fa-solid fa-trash-can"></i>
                                          </button>
                                      </form>
                                  </td>
                                  @else
                                  <td></td>
                                  @endif
                              </tr>
                              <tr>
                                  <td>{{ ucwords('sponsor ship tiga') }}</td>
                                  @if($sponsorShipTiga->picture_path ?? '')
                                  <td><img width="150px" src="{{ url('/storage/assets/sponsorshiptiga/'.$sponsorShipTiga->picture_path) }}"></td>
                                  @else
                                  <td></td>
                                  @endif
                                  <td>{{ $sponsorShipTiga->link_web ?? '' }}</td>
                                  <td>{{ $sponsorShipTiga->created_at ?? '' }}</td>
                                  <td>{{ $sponsorShipTiga->updated_at ?? '' }}</td>
                                  @if($sponsorShipTiga != null)
                                  <td>
                                      <a href="{{ route('sponsorShipTiga.edit', $sponsorShipTiga->id ?? '') }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('sponsorShipTiga.destroy', $sponsorShipTiga->id ?? '') }}" method="POST" class="d-inline">
                                          {!! method_field('delete') . csrf_field() !!}
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                              <i class="fa-solid fa-trash-can"></i>
                                          </button>
                                      </form>
                                  </td>
                                  @else
                                  <td></td>
                                  @endif
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
              <!--Table SponsorShip End-->
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <!-- PartnerShip Start-->
              <div class="mx-3 my-3 card">
                  <div class="card-body">
                      <div class="container-fluid">
                          <form method="post" action="{{ route('partnerShip.store') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <label>{{ ucwords('foto flyer only ITDev Academy') }}</label>
                                  <input type="file" name="picture_path" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>{{ ucwords('link web') }}</label>
                                  <input type="text" name="link_web" class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web') }}">
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

                              <a class="mt-3 btn btn-danger" href="{{ route('backend.keuangan') }}">Back</a>
                              <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- PartnerShip End-->
              <!--Table PartnerShip Start-->
              <div class="container-fluid">
                  <div class="card-body table-responsive">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="1px">{{ ucwords('foto gambar') }}</th>
                                  <th width="1px">{{ ucwords('link web') }}</th>
                                  <th width="1px">Created At</th>
                                  <th width="1px">Updated At</th>
                                  <th width="0.01%">OPSI</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($partnerShip as $partner)
                              <tr>
                                  <td><img width="150px" src="{{ url('/storage/assets/partnership/'.$partner->picture_path) }}"></td>
                                  <td>{{ $partner->link_web }}</td>
                                  <td>{{ $partner->created_at }}</td>
                                  <td>{{ $partner->updated_at }}</td>
                                  <td>
                                      <a href="{{ route('partnerShip.edit', $partner->id) }}" class="mb-1 btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                      <form action="{{ route('partnerShip.destroy', $partner->id) }}" method="POST" class="d-inline">
                                          {!! method_field('delete') . csrf_field() !!}
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
              <!--Table PartnerShip End-->
          </div>
      </div>





  </div>
  <!---Container Fluid-->
  </div>
  @endsection
