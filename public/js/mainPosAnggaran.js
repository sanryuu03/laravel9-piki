$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#pos-anggaran").on("change", function () {
            let pos_anggarans_id = $("#pos-anggaran").val();
            console.log(`ini pos anggaran ${pos_anggarans_id}`);
            $.ajax({
                type: "POST",
                url: '/posAnggaran',
                data: {
                    pos_anggarans_id,
                },
                cache: false,
                success: function (msg) {
                    $("#nama_kegiatan").html(msg);
                    console.log(`msg ${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});
