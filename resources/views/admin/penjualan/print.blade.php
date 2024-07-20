<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Mutasi Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
        }

        .header {
            text-align: left;
            margin-bottom: 10px;
        }

        .header img {
            width: 50px;
            float: left;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
            font-weight: 700;
        }

        .header div {
            float: left;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .total-row {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        @media print {
            .container {
                border: none;
                padding: 0;
            }

            .table th,
            .table td {
                font-size: 10px;
                padding: 2px;
            }

            .header p {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <div>
                <p>Laporan Barang Terjual</p>
                <p>Delcraft</p>
                <p>{{ $currentDate }}</p>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah Terjual</th>
                    <th>Harga Jual</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Data as $data)
                    <tr>
                        <td>{{ $data->nama_stok }}</td>
                        <td>{{ $data->total_qty }} unit</td>
                        <td>Rp{{ number_format($data->harga_jual, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($data->total_harga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3" class="total" style="text-align:right">Total:</td>
                    <td class="total">{{ 'Rp ' . number_format($TotalJual, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
