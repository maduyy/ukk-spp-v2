<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Bukti Pembayaran</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      table td, table th {
        border: 1px solid black;
        padding: 2px;
        white-space: nowrap;

      }

    </style>
</head>
<body>
    <h3 align="center">Laporan Hasil Pembayaran</h3>
    <table class="table align-items-center mt-4 mb-0">
        <thead>
          <tr>
            <th>No</th>
            <th>Petugas</th>
            <th>NISN</th>
            <th>SPP</th>
            <th>Bulan Dibayar</th>
            <th>Jumlah Bayar</th>
            <th>Sisa Tunggakan</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($history as $row)
            <tr>
              <td>
                {{ $loop->iteration }}
              </td>
              <td>
              {{ $row->user->nama_petugas }}
              </td>
              <td>
                {{ $row->nisn }}
              </td>
              <td>
                Rp {{ number_format($row->siswa->spp->nominal, 0, ',', '.') }}
              </td>
              <td>
              {{ $row->bulan_dibayar }} bulan
              </td>
              <td>
               Rp {{ number_format($row->jumlah_bayar, 0, ',', '.') }}
              </td>
              <td>
               Rp {{ number_format($row->total, 0, ',', '.') }}
              </td>
              <td>
               {{ $row->tgl_bayar }}
              </td>
              <td>
                {{ $row->status }}
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
