$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#pos-anggaran").on("change", function () {
            let pos_anggarans_id = $("#pos-anggaran").val();
            console.log(`ini select pos anggaran ${pos_anggarans_id}`);
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

///laporan keuangan
$(document).ready(function () {
    var tablePemasukan = $("table.table-pemasukan").DataTable();
    var tablePengeluaran = $("table.table-pengeluaran").DataTable();

    $("#start").on("change", function () {
        let posAnggaran = $("#pos-anggaran :selected").val();
        console.log(`ini filter tanggal tanpa pos anggaran ${posAnggaran}`);
        if (posAnggaran != 1 && posAnggaran != 2) {
        var date = new Date($('#start').val());
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        let bulan = $("#start :selected").datepicker("getDate");
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
    }
    });

    $("#nama_kegiatan").on("change", function () {
        let posAnggaran = $("#pos-anggaran :selected").val();
        let namaKegiatan = $("#nama_kegiatan :selected").val();
        let search = this.value;
        console.log(`ini search ${search}`);
        console.log(`filter pos anggaran ${posAnggaran}`);
        console.log(`filter nama kegiatan ${namaKegiatan}`);
        console.log(`######################################`);
        if (posAnggaran == 1) {
            let namaKegiatan = $("#nama_kegiatan :selected").text();
            $.ajax({
                type: "GET",
                url: '/admin/cariPemasukanLaporanKeuangan',
                data: {
                    namaKegiatan,
                },
                cache: false,
                success: function (msg) {
                    $("table.table-pemasukan").html(msg);
                    console.log(`isi filter pemasukan ${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
            // tablePemasukan.search(namaKegiatan).draw();
            // tablePemasukan.search("");
            $("#start").on("change", function () {
                var date = new Date($('#start').val());
                var month = date.getMonth() + 1;
                console.log(`filter month ${month}`);
                console.log(`######################################`);
                $.ajax({
                    type: "GET",
                    url: '/admin/cariPemasukanLaporanKeuanganFilterTanggal',
                    data: {
                        month,
                    },
                    cache: false,
                    success: function (msg) {
                        $("table.table-pemasukan").html(msg);
                        console.log(`isi filter pemasukan via tanggal ${msg}`);
                    },
                    error: function (data) {
                        console.log(`errornya ${data}`);
                    },
                });
            })
        }
        if (posAnggaran == 2) {
            $.ajax({
                type: "GET",
                url: '/admin/cariPengeluaranLaporanKeuangan',
                data: {
                    namaKegiatan,
                },
                cache: false,
                success: function (msg) {
                    $("table.table-pengeluaran").html(msg);
                    console.log(`isi filter pengeluaran ${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
            // tablePengeluaran.search(namaKegiatan).draw();
            // tablePengeluaran.search("");
            $("#start").on("change", function () {
                var date = new Date($('#start').val());
                var month = date.getMonth() + 1;
                console.log(`filter month ${month}`);
                console.log(`######################################`);
                $.ajax({
                    type: "GET",
                    url: '/admin/cariPengeluaranLaporanKeuanganFilterTanggal',
                    data: {
                        month,
                    },
                    cache: false,
                    success: function (msg) {
                        $("table.table-pengeluaran").html(msg);
                        console.log(`isi filter pengeluaran via tanggal ${msg}`);
                    },
                    error: function (data) {
                        console.log(`errornya ${data}`);
                    },
                });
            });
        }
    });
});


