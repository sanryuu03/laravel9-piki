  @extends('layouts.main')

  @section('menuContent')


  <!-- Berita Start-->
  <style>
      .list-kategori-berita h1 {
          margin-top: 5px !important;
          padding-top: 15px !important;
          padding-bottom: 20px !important;
          margin-left: 0px !important;
          margin-right: 0px !important;
          margin-bottom: 10px !important;
          text-align: center;
          font-weight: 400;
          font-size: 25px !important;
          width: 100% !important;
          /* background-color: #f7f7f7; */
          background-color: #61c7ff;
      }

      #hr-list-kategori-berita {
          margin-top: 0px !important;
      }

      .jumper-berita {
          margin-top: 5px !important;
      }

  </style>
  <div class="pt-5 mt-3 container-xxl">
      <div class="row">
          <div class="col-8">
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
              </div>
              </p>
              <a class="mt-1 btn btn-danger" href="{{ url('/mobile#berita-lainnya') }}">Back to News</a>
          </div>
          <div class="pt-5 col-4">
              @if(isset($sponsorshipNews1))
              <a href="{{ $sponsorshipNews1->link_web }}">
              <img src="{{ url('/storage/assets/sponsorshipnews/'.$sponsorshipNews1->picture_path) }}" class="img-fluid" alt="...">
              </a>
              @else
              <a href="https://itdevacademy.com/">
              <img src="/images/hitmbiru.png" class="img-fluid" alt="...">
              </a>
              @endif
              <ul class="mt-1 list-group">
                  <li class="list-group-item active" aria-current="true">{{ ucwords('berita lainnya') }}</li>
                  @foreach($beritaSejenis as $key => $lainnya)
                  <a href="{{ route('read.more.berita', $lainnya->slug) }}" class='list-group-item list-group-item-action list-group-item-primary fs-6' style='text-decoration: none;'>
                      {{ $lainnya->judul_berita }}
                  </a>
                  @endforeach
                  <a class="text-center text-white btn btn-info d-flex align-items-center justify-content-center" href="/beritaLainnya/webView">{{ ucwords('Lihat lebih banyak berita') }}</a>
              </ul>
              @if(isset($sponsorshipNews2))
              <a href="{{ $sponsorshipNews2->link_web }}">
              <img src="{{ url('/storage/assets/sponsorshipnews/'.$sponsorshipNews2->picture_path) }}" class="mt-1 img-fluid" alt="...">
              </a>
              @else
              <a href="https://play.google.com/store/apps/details?id=id.pt.rpn.kede">
              <img src="/images/hehe.jpg" class="mt-1 img-fluid" alt="...">
              </a>
              @endif
              @if(isset($sponsorshipNews3))
              <a href="{{ $sponsorshipNews3->link_web }}">
              <img src="{{ url('/storage/assets/sponsorshipnews/'.$sponsorshipNews3->picture_path) }}" class="mt-1 img-fluid" alt="...">
              </a>
              @else
              <a href="https://mitradesakmd.com/">
              <img src="/images/mitradesa.jpeg" class="mt-1 img-fluid" alt="...">
              </a>
              @endif
              <img src="/images/page 1a.jpg" class="mt-1 img-fluid" alt="...">
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
                  <a href="/berita/webView/{{ $berita->slug }}" class="read-more text-sky-400 text-decoration-none">
                      {{ $berita->judul_berita }}
                  </a>
              </h1>
              <hr id="hr-list-kategori-berita">
              @endforeach
          </div>
      </div>
  </div>
  <!-- Berita End-->
  <div class="jumper-berita d-flex justify-content-center">
      <a type="button" class="mb-1 btn btn-outline-primary" href="/categories/indonesia-flag">{{ ucwords('nasional') }}</a>
      <a type="button" class="mb-1 btn btn-outline-secondary" href="/categories/region">{{ ucwords('daerah') }}</a>
      <a type="button" class="mb-1 btn btn-outline-success" href="/categories/campus">{{ ucwords('kampus') }}</a>
      <a type="button" class="mb-1 btn btn-outline-danger" href="/categories/church">{{ ucwords('gereja') }}</a>
      <a type="button" class="mb-1 btn btn-outline-warning" href="/categories/economy">{{ ucwords('ekonomi') }}</a>
      <a type="button" class="mb-1 btn btn-outline-info" href="/categories/bendera-indonesia">{{ ucwords('politik') }}</a>
      <a type="button" class="mb-1 btn btn-outline-dark" href="/categories/computer">{{ ucwords('teknologi') }}</a>
      <a type="button" class="mb-1 btn btn-outline-dark" href="/categories/north-sumatra">{{ ucwords('budaya') }}</a>
  </div>
  @push('custom')
      <script>
        $("#share").jsSocials({
                showLabel: false,
    showCount: false,
            shares: ["facebook", "whatsapp"]
        });
    </script>
  @endpush
  @endsection
