<!DOCTYPE html>
<html>
<head>
    <title>Laporan SDM</title>
    <style>
        #customers {
            /*font-family: Arial, Helvetica, sans-serif;*/
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            /*padding: 8px;*/
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: left;
            background-color: #0f59d2;
            color: white;
        }

    </style>
</head>
<body>

    <table align="center">
        <tr>
            <td>
                <img src="assets/images/logo.png" style="width:70px;height:70px;" />
            </td>
            <td>
                <span style="color:blue;font-weight:bold;font-size:22px;">PIKI SUMUT</span> <br />
                <span style="color:#454647;font-weight:bold;font-size:16px;">{{ $item }}</span>
            </td>
        </tr>
    </table>

    <hr>

    <h3 align="center">Laporan Anggota</h3>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp / WA</th>
        </tr>
        @foreach($user as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->phone_number }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
