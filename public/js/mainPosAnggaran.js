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

$(document).ready(function () {
    var tablePemasukan = $("table.table-pemasukan").DataTable();
    var tablePengeluaran = $("table.table-pengeluaran").DataTable();

    $("#pos-anggaran").on("change", function () {
        let posAnggaran = $("#pos-anggaran :selected").text();
        let search = this.value;
        console.log(`filter pos anggaran ${posAnggaran}`);
        console.log(`ini search ${search}`);
        console.log(`======================================`);
    });

    $("#nama_kegiatan").on("change", function () {
        let posAnggaran = $("#pos-anggaran :selected").text();
        let namaKegiatan = $("#nama_kegiatan :selected").text();
        let search = this.value;
        console.log(`filter nama kegiatan ${namaKegiatan}`);
        console.log(`ini search ${search}`);
        console.log(`######################################`);
        if (posAnggaran == 'pemasukan') {
            tablePemasukan.search(namaKegiatan).draw();
            tablePemasukan.search("");
        } else {
            tablePengeluaran.search(namaKegiatan).draw();
            tablePengeluaran.search("");
        }
    });

    $("#start").on("change", function () {
        var date = new Date($('#start').val());
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        let bulan = $("#start :selected").text();
        let search = this.value;
        // console.log(`filter month ${month}`);
        // console.log(`filter full year ${[year, month, day].join('-')}`);
        // console.log(`filter bulan ${bulan}`);
        console.log(`ini search ${search}`);
        console.log(`######################################`);
        tablePemasukan.search(search).draw();
        tablePemasukan.search("");
        tablePengeluaran.search(search).draw();
        tablePengeluaran.search("");
    });
});

