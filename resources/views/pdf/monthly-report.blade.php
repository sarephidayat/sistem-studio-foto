<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>

        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
        }

        th {
            background: #f2f2f2;
        }

    </style>

</head>

<body>

    <h2>
        Monthly Report
    </h2>

    <p>
        Periode:
        {{ $periode }}
    </p>

    <table>

        <thead>

            <tr>
                <th>Customer</th>
                <th>Studio</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Background</th>
                <th>Jumlah Orang</th>
            </tr>

        </thead>

        <tbody>

            @foreach($bookings as $booking)

                <tr>

                    <td>
                        {{ $booking->user->name }}
                    </td>

                    <td>
                        {{ $booking->studio->nama }}
                    </td>

                    <td>
                        {{ $booking->tanggal }}
                    </td>

                    <td>
                        {{ date('H:i', strtotime($booking->waktu->waktu)) }}
                    </td>

                    <td>
                        {{ $booking->background->nama }}
                    </td>

                    <td>
                        {{ $booking->jumlah_orang }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>