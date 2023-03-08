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
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">No</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Petugas</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">NISN</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">SPP</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Bulan Dibayar</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Jumlah Bayar</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Sisa Tunggakan</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Tanggal</th>
            <th class="text-uppercase text-xs font-weight-bolder opacity-9">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($history as $row)
            <tr>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $loop->iteration }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
              {{ $row->user->nama_petugas }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $row->nisn }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                Rp {{ number_format($row->siswa->spp->nominal, 0, ',', '.') }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
              {{ $row->bulan_dibayar }} bulan
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
               Rp {{ number_format($row->jumlah_bayar, 0, ',', '.') }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
               Rp {{ number_format($row->total, 0, ',', '.') }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
               {{ $row->tgl_bayar }}
              </td>
              <td class="text-xs font-weight-bolder opacity-7">
                {{ $row->status }}
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
