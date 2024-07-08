<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        /* styles.css */
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: Arial, sans-serif;
            /* margin: 0; */
            padding-bottom: 150px;
        }

        .container {
            width: 100%;
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="container">

        <h1>DATA PENYEWAAN LAPANG <br> DARI TANGGAL {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y') }} s.d {{ \Carbon\Carbon::parse($endDate)->format('d-m-Y') }}</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Sewa</th>
                    <th>Jenis Lapangan</th>
                    <th>Kegiatan</th>
                    <th>Mulai Sewa</th>
                    <th>Status</th>
                    <th>Lama Sewa</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewaan as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->jenisLapang->lapang->jenis_sewa }}</td>
                        <td>{{ $item->jenisLapang->jenis_lapang }}</td>
                        <td>{{ $item->jadwal->kegiatan }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($item->jadwal->mulai_sewa)->format('d-m-Y') }}/{{ $item->jadwal->hari }}/{{ $item->jadwal->jam }}
                        </td>
                        <td>{{ $item->jadwal->status }}</td>
                        <td>{{ $item->jadwal->lama_sewa }}</td>
                        <td>
                            @if ($item->bukti_transaksi == null)
                                <b><i>*Belum mengirim bukti pembayaran</i></b>
                            @else
                                <img src="bukti_transaksi/{{ $item->bukti_transaksi }}" alt=""
                                    style="width: 70px;">
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 'aktif')
                                <span><b>aktif</b></span>
                            @elseif ($item->status == 'selesai')
                                <span><b>selesai</b></span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
