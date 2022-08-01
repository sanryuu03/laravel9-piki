$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $(".judul_agenda").on("click", function () {
            let judulAgenda = $(this).text();
            console.log(`ini judul agenda ${judulAgenda}`);
            $.ajax({
                type: "POST",
                url: '/selectAgenda',
                data: {
                    'judulAgenda' : judulAgenda,
                },
                cache: false,
                success: function (msg) {
                    msg = JSON.parse(msg);
                    $(".flayer_agenda").attr('src',`/storage/assets/agenda/${msg.picture_path}`);
                    $(".keterangan_agenda").html(msg.keterangan_agenda);
                    console.log(`${msg.picture_path}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});
