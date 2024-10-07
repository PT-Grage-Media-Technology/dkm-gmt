<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bukti Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        /* Gaya untuk perangkat mobile */
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table thead {
                display: none;
            }

            table tr {
                display: block;
                margin-bottom: 20px;
                border-bottom: 2px solid #ddd;
            }

            table td {
                display: block;
                text-align: right;
                font-size: 14px;
                border-bottom: 1px solid #ddd;
                position: relative;
                padding-left: 50%;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }

        .download-btn {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            font-size: 14px;
        }

        .download-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Daftar Bukti Pembayaran</h1>
    <table>
        <thead>
            <tr>

                <th>ID Tabungan Inputs</th>
                <th>Bukti Pembayaran</th>
                <th>Unduh</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping data dari database -->
            @foreach ($buktiBayar as $item)
            <tr>

                <td data-label="ID Tabungan Inputs">{{ $item->tabungan_input_id }}</td> <!-- id_tabunganinputs -->
                <td data-label="Bukti Pembayaran">
                    <img src="{{ asset('storage/' . $item->bukti_proses) }}" alt="Bukti Pembayaran" style="width: 100px; height: auto;">
                </td> <!-- bukti_pembayaran -->
                <td data-label="Unduh">
                    <a href="{{ asset('storage/' . $item->bukti_proses) }}" download class="download-btn">Unduh</a>
                </td>
            </tr>
        @endforeach


            <!-- Tambahkan baris sesuai dengan data yang ada -->
        </tbody>
    </table>
</body>
</html>
