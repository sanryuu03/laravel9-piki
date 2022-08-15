$(document).ready(function () {
    $("#table_id").DataTable();
});

const title = document.querySelector("#title");
const slug = document.querySelector("#slug");
if (title) {
    title.addEventListener("change", function () {
        console.log(`ini nilai title ${title.value}`);
        fetch("checkSlug?title=" + title.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });
}
// trix start
document.addEventListener("trix-file-accept", (event) => {
    event.preventDefault();
});
// trix end
// summer note start
$('#summernote').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    // height: 200,
    focus: true
  });
// summer note end

$(document).ready(function () {
    var table = $("#table_id").DataTable();

    $(".filter-province").on("change", function () {
        let provinsiFilter = $("#table-filter :selected").text();
        let search = this.value;
        console.log(`filter provinsi ${provinsiFilter}`);
        console.log(`ini search ${search}`);
        console.log(`======================================`);
        table.search(provinsiFilter).draw();
    });
    $(".filter-kota").on("change", function () {
        let kotaFilter = $(".filter-kota :selected").text();
        let search = this.value;
        console.log(`filter Kab/Kota ${kotaFilter}`);
        console.log(`ini search ${search}`);
        console.log(`######################################`);
        table.search(kotaFilter).draw();
    });
});
$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#table-filter").on("change", function () {
            let id_provinsi = $("#table-filter :selected").val();
            console.log(`ini provinsi id ${id_provinsi}`);
            console.log(`======================================`);
            $.ajax({
                type: "POST",
                url: "/cities",
                data: {
                    id_provinsi: id_provinsi,
                },
                cache: false,
                success: function (msg) {
                    $(".filter-kota").html(msg);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
        $("#printTable").on("click", function () {
            let id_provinsi = $("#table-filter :selected").val();
            console.log(`ini provinsi id ${id_provinsi}`);
            console.log(`======================================`);
            console.log(`tombol print table di klik`);
            $.ajax({
                type: "post",
                url: "/admin/landingpageanggota/exporttable",
                data: {
                    id_provinsi,
                },
                cache: false,
                success: function (msg) {
                    console.log(`kirim id provinsi ${msg}`);
                },
                error: function (data) {
                    console.log(`errornya ${data}`);
                },
            });
        });
    });
});

// backend anggota
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

$(document).ready(function () {
    var table = $("#table_id").DataTable();

    $(".table-filter-jenis-pemasukan").on("change", function () {
        let jenisPemasukanFilter = $("#table-filter-jenis-pemasukan :selected").text();
        let search = this.value;
        console.log(`filter jenis pemasukan ${jenisPemasukanFilter}`);
        console.log(`ini search ${search}`);
        console.log(`======================================`);
        table.search(jenisPemasukanFilter).draw();
        table.search("");
    });
});
$('.filter-jenis-setoran').on("change", function () {
    let jenisPemasukanFilter = $("#filter-jenis-setoran :selected").text();
    let search = this.value;
    console.log(`filter jenis pemasukan ${jenisPemasukanFilter}`);
    console.log(`ini value ${search}`);
    console.log(`======================================`);
    let iuranBulan = document.querySelector("#iuran-bulan");
    let jumlah = document.querySelector('#jumlah');
    if (jenisPemasukanFilter === "All") {
        iuranBulan.classList.add("d-none");
    }
    if (jenisPemasukanFilter === "iuran") {
        jumlah.classList.remove("d-none");
        iuranBulan.classList.remove("d-none");
    }
    else {
        iuranBulan.classList.add("d-none");
        jumlah.classList.remove("d-none");
    }
});
$(document).ready(function () {
    $("#harga_satuan").on("change", function () {
        let volume = $("#volume").val();
        let hargaSatuan = $("#harga_satuan").val();
        let jumlah = volume * hargaSatuan
        let search = this.value;
        console.log(`filter jenis volume ${volume}`);
        console.log(`filter jenis harga satuan ${hargaSatuan}`);
        console.log(`ini search ${search}`);
        console.log(`======================================`);
        console.log(`jumlah ${jumlah}`);
        document.getElementById('jumlah').innerHTML = 'heheh'
        $("#jumlah").val(jumlah);
    });
});
