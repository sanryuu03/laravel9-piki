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
                <span style="color:#454647;font-weight:bold;font-size:16px;">Kab</span>
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
        <tr>
                <td style="width: 3%;">1</td>
                <td style="width: 7%;">san</td>
                <td style="width: 7%;">jalan</td>
                <td style="width: 17%;">081234566</td>
        </tr>
    </table>
</body>
</html>
