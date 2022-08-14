  @extends('layouts.mainMobile')
@prepend('styles')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />
@endprepend
  @section('menuContent')


  <!-- Berita Start-->
  <style>
          h1 {
              margin-top: 25px !important;
          }

          .list-kategori-berita h1 {
    margin-top: 5px !important;
    padding-top: 15px !important;
    padding-bottom: 20px !important;
    margin-left: 0px !important;
    margin-right: 0px !important;
    margin-bottom: -20px !important;
    text-align: center;
    font-weight:400;
    font-size: 25px !important;
    width: 100% !important;
    /* background-color: #f7f7f7; */
    background-color: #61c7ff;
}

      #hr-list-kategori-berita {
        margin-top: 10px !important;
        margin-bottom: -10px !important;
      }

      .jumper-berita {
        margin-top: 15px !important;
      }

      .backToNews {
        margin-top: -20px;
      }
  </style>
  <div class="pt-5 container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <h1 class="fs-1">
                  {{ $news->judul_berita }}
              </h1>
              <p>
                  {{ $news->created_at }}
                  <a class="text-sky-600" href="{{ route('isi.kategori', $news->categoryNews->slug) }}">{{ $news->categoryNews->name }}</a>
              </p>
              <img src="{{ url('/storage/assets/news/'.$news->picture_path) }}" class="img-fluid" alt="">

              <p class="card-text"><small class="text-muted">{!! $news->keterangan_foto !!}</small></p>
              <article>
              {!! $news->isi_berita !!}
              </article>
      <hr class="mt-1">
              <div>
              {{ ucwords('share:') }}
              <p id="share">
              </p>
              </div>
              <a class="btn btn-danger backToNews" href="{{ url('/mobile#berita-lainnya') }}">Back to News</a>
          </div>
      </div>
  </div>
    {{-- iklan start--}}
<div class="text-center container-xxl">
  <div class="row">
    <div class="col">
                    @if(isset($sponsorshipNews4))
              <a href="{{ $sponsorshipNews4->link_web }}">
              <img src="{{ url('/storage/assets/sponsorshipnews/'.$sponsorshipNews4->picture_path) }}" class="mt-1 img-fluid" alt="..." style="height:100%; width:100%;">
              </a>
              @else
              <a href="https://mitradesakmd.com/">
              <img src="/images/mitradesa.jpeg" class="mt-1 img-fluid" alt="...">
              </a>
              @endif
    </div>
    <div class="col">
                          @if(isset($sponsorshipNews5))
              <a href="{{ $sponsorshipNews5->link_web }}">
              <img src="{{ url('/storage/assets/sponsorshipnews/'.$sponsorshipNews5->picture_path) }}" class="mt-1 img-fluid" alt="..." style="height:100%; width:100%;">
              </a>
              @else
              <a href="https://mitradesakmd.com/">
              <img src="/images/mitradesa.jpeg" class="mt-1 img-fluid" alt="...">
              </a>
              @endif
    </div>
    <div class="col">
                                @if(isset($sponsorshipNews6))
              <a href="{{ $sponsorshipNews6->link_web }}">
              <img src="{{ url('/storage/assets/sponsorshipnews/'.$sponsorshipNews6->picture_path) }}" class="mt-1 img-fluid" alt="..." style="height:100%; width:100%;">
              </a>
              @else
              <a href="https://mitradesakmd.com/">
              <img src="/images/mitradesa.jpeg" class="mt-1 img-fluid" alt="...">
              </a>
              @endif
    </div>
  </div>
</div>
{{-- iklan end--}}
{{-- kategori berita sejenis --}}
  <div class="p-0 container-fluid list-kategori-berita">
      <h1 class="text-center fs-1 text-primary">{{ ucwords('berita ') }}{{ $category }}{{ ucwords(' lainnya') }}</h1>
  </div>
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-10">
              @foreach($categoryNews as $berita)
              <h1 class="fs-6">
              <a href="/berita/mobileView/{{ $berita->slug }}" class="read-more text-sky-400 text-decoration-none">
                  {{ $berita->judul_berita }}
              </a>
              </h1>
              <hr id="hr-list-kategori-berita">
              @endforeach
          </div>
      </div>
  </div>
  <!-- Berita End-->

<div class="jumper-berita">
<a type="button" class="mb-1 btn btn-outline-primary" href="/categories/mobileView/indonesia-flag">{{ ucwords('nasional') }}</a>
<a type="button" class="mb-1 btn btn-outline-secondary" href="/categories/mobileView/region">{{ ucwords('daerah') }}</a>
<a type="button" class="mb-1 btn btn-outline-success" href="/categories/mobileView/campus">{{ ucwords('kampus') }}</a>
<a type="button" class="mb-1 btn btn-outline-danger" href="/categories/mobileView/church">{{ ucwords('gereja') }}</a>
<a type="button" class="mb-1 btn btn-outline-warning" href="/categories/mobileView/economy">{{ ucwords('ekonomi') }}</a>
<a type="button" class="mb-1 btn btn-outline-info" href="/categories/mobileView/bendera-indonesia">{{ ucwords('politik') }}</a>
<a type="button" class="mb-1 btn btn-outline-dark" href="/categories/mobileView/computer">{{ ucwords('teknologi') }}</a>
<a type="button" class="mb-1 btn btn-outline-dark" href="/categories/mobileView/north-sumatra">{{ ucwords('budaya') }}</a>
</div>
  @push('custom')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
      <script>
        $("#share").jsSocials({
                showLabel: false,
    showCount: false,
            shares: ["facebook", "whatsapp"]
        });
    </script>
  @endpush
  @endsection
