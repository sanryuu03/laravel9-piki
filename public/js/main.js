$(document).ready(function () {
    $("#table_id").DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'pdf', 'print'
        ]
    });
});

const title = document.querySelector("#title");
const slug = document.querySelector("#slug");
if (title) {
    title.addEventListener("change", function () {
        fetch("checkSlug?title=" + title.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });
}

document.addEventListener("trix-file-accept", (event) => {
    event.preventDefault();
});

$(document).ready(function () {
    var table = $("#table_id").DataTable();

    $(".filter-province").on("change", function () {
        let provinsiFilter = $("#table-filter :selected").text();
        let search = this.value;
        console.log(`filter provinsi ${provinsiFilter}`);
        console.log(`ini search ${search}`);
        console.log(`======================================`);
        table.search(provinsiFilter).draw();
        table.search("");
    });

    $(".filter-kota").on("change", function () {
        let kotaFilter = $(".filter-kota :selected").text();
        let search = this.value;
        console.log(`filter Kab/Kota ${kotaFilter}`);
        console.log(`ini search ${search}`);
        console.log(`######################################`);
        table.search(kotaFilter).draw();
        table.search("");
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
                url: '/cities',
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
    });
});
