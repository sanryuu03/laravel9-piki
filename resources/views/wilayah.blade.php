<!doctype html>
<html lang="en">
<head>
    <title>Dependant Dropdown Laravolt/Indonesia</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mb-3">
            <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
            <div class="col-md-9">
                <select class="form-control" name="provinsi" id="provinsi" required>
                    <option>==Pilih Salah Satu==</option>
                    @foreach ($provinces as $provinsi)
                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
            <div class="col-md-9">
                <select class="form-control" name="kota" id="kota" required>
                    <option>==Pilih Salah Satu==</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
            <div class="col-md-9">
                <select class="form-control" name="kecamatan" id="kecamatan" required>
                    <option>==Pilih Salah Satu==</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-3 col-form-label" for="desa">Desa</label>
            <div class="col-md-9">
                <select class="form-control" name="desa" id="desa" required>
                    <option>==Pilih Salah Satu==</option>
                </select>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $(function() {
                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();
                    console.log(`ini provinsi id ${id_provinsi}`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("cities") }}',
                        data: {id_provinsi: id_provinsi},
                        cache:false,
                        success: function(msg){
                            $('#kota').html(msg);
                            $('#kecamatan').html('<option>==Pilih Kabupaten==</option>');
                            $('#desa').html('<option>==Pilih Desa==</option>');
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

            $(function() {
                $('#kota').on('change', function() {
                    let id_kota = $('#kota').val();
                    console.log(`ini kota id ${id_kota}`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("districts") }}',
                        data: {id_kota},
                        cache:false,
                        success: function(msg){
                            $('#kecamatan').html(msg);
                            $('#desa').html('<option>==Pilih Desa==</option>');
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

            $(function() {
                $('#kecamatan').on('change', function() {
                    let id_kecamatan = $('#kecamatan').val();
                    console.log(`ini kecamatan id ${id_kecamatan}`);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("villages") }}',
                        data: {id_kecamatan},
                        cache:false,
                        success: function(msg){
                            $('#desa').html(msg);
                        },
                        error: function(data){
                            console.log(`errornya ${data}`);
                        },
                    });
                });
            });

        });
    </script>
</body>
</html>
