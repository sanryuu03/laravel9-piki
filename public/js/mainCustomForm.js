$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#master-menu-navbar").on("change", function () {
            let master_menu_navbars_id = $("#master-menu-navbar").val();
            console.log(`ini master menu navbar ${master_menu_navbars_id}`);
            $.ajax({
                type: "POST",
                url: '/customForm',
                data: {
                    master_menu_navbars_id,
                },
                cache: false,
                success: function (msg) {
                    $("#nama_sub_menu").html(msg);
                    console.log(`msg ${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});
