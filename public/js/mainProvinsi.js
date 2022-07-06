$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#provinsi").on("change", function () {
            let id_provinsi = $("#provinsi").val();
            console.log(`ini provinsi id ${id_provinsi}`);
            $.ajax({
                type: "POST",
                url: '/cities',
                data: {
                    id_provinsi: id_provinsi,
                },
                cache: false,
                success: function (msg) {
                    $("#kota").html(msg);
                    $("#kecamatan").html(
                        "<option>==Pilih Kabupaten==</option>"
                    );
                    $("#desa").html("<option>==Pilih Desa==</option>");
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });

    $(function () {
        $("#kota").on("change", function () {
            let id_kota = $("#kota").val();
            console.log(`ini kota id ${id_kota}`);
            $.ajax({
                type: "POST",
                url: '/districts',
                data: {
                    id_kota,
                },
                cache: false,
                success: function (msg) {
                    $("#kecamatan").html(msg);
                    $("#desa").html("<option>==Pilih Desa==</option>");
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });

    $(function () {
        $("#kecamatan").on("change", function () {
            let id_kecamatan = $("#kecamatan").val();
            console.log(`ini kecamatan id ${id_kecamatan}`);
            $.ajax({
                type: "POST",
                url: '/villages',
                data: {
                    id_kecamatan,
                },
                cache: false,
                success: function (msg) {
                    $("#desa").html(msg);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});
