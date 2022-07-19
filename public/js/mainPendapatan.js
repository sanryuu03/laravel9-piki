$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#nama-penyumbang").on("keyup", function () {
            let nama_penyumbang = $("#nama-penyumbang").val();
            console.log(`filter namaPenyumbang ${nama_penyumbang}`);
            let namaPenyumbang = document.querySelector("#nama-penyumbang");
            let telpSelectUser = document.querySelector(".telp-select");
            let telpInputUser = document.querySelector(".telp");
            if (nama_penyumbang !== "") {
                telpSelectUser.classList.remove("d-none");
                telpInputUser.classList.add("d-none");
            }
            $.ajax({
                type: "POST",
                url: '/dataUser',
                data: {
                    nama_penyumbang,
                },
                cache: false,
                success: function (msg) {
                    $("#telp").html(msg);
                    console.log(`msg ${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});
