  @extends('layouts.mainMobile')
  @section('menuContent')
  <style>
      .tentang h1 {
          margin-top: 70px !important;
          padding-top: 15px !important;
          padding-bottom: 20px !important;
          margin-left: 0px !important;
          margin-right: 0px !important;
          font-weight: 400;
          font-size: 25px !important;
          /* background-color: #f7f7f7; */
          background-color: #61c7ff;
      }

  </style>

  <!-- Kategory Berita PIKI Terbaru Start-->
  <div class="p-0 container-sm tentang">
      <h1 class="mb-3 text-center s-1">{{ ucwords('tentang') }}</h1>
  </div>
    <div class="jumper-berita">
    <div class="container-sm">
              @foreach($backendTentang as $key => $tentang)
      <a type="button" class="judul_tentang mb-1 btn {{ $key % 2 == 0 ? 'btn-outline-primary' : 'btn-outline-secondary' }}">{{ ucwords($tentang->judul) }}</a>
              @endforeach
      <a type="button" class="mb-1 dokumen_tentang btn btn-outline-info">{{ ucwords('dokumen') }}</a>
    </div>
                    <div class="mt-1 card card-body keterangan_tentang">
                  </div>
  </div>

  <!-- Kategory Berita PIKI Terbaru End-->
  @push('custom')
    <script>
    $(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $(".dokumen_tentang").on("click", function () {
            let dokumenTentang = $(this).text();
            console.log(`ini judul dokumen ${dokumenTentang}`);
            $.ajax({
                type: "POST",
                url: '/tentang/mobileView',
                data: {
                    'dokumenTentang' : dokumenTentang,
                },
                cache: false,
                success: function (msg) {
                    $(".keterangan_tentang").html(msg);
                    console.log(`${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
        $(".judul_tentang").on("click", function () {
            let judulTentang = $(this).text();
            console.log(`ini judul tentang ${judulTentang}`);
            $.ajax({
                type: "POST",
                url: '/tentang/mobileView',
                data: {
                    'judulTentang' : judulTentang,
                },
                cache: false,
                success: function (msg) {
                    msg = JSON.parse(msg);
                    $(".keterangan_tentang").html(msg.keterangan);
                    console.log(`${msg.keterangan}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});
    </script>
  @endpush
  @endsection
