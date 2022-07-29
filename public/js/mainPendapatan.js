$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#nama-penyumbang").on("keyup", function () {
            let nama_penyetor = $("#nama-penyumbang").val();
            console.log(`filter namaPenyumbang ${nama_penyetor}`);
            let namaPenyumbang = document.querySelector("#nama-penyumbang");
            let telpSelectUser = document.querySelector(".telp-select");
            let telpInputUser = document.querySelector(".telp");
            if (nama_penyetor !== "") {
                telpSelectUser.classList.remove("d-none");
                telpInputUser.classList.add("d-none");
            }
            $.ajax({
                type: "POST",
                url: '/dataUser',
                data: {
                    nama_penyetor,
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
