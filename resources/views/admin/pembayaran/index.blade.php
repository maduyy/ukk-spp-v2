@extends('layouts.layout')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Entri Pembayaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Pembayaran</h2>
            <p class="section-lead">List data entri pembayaran siswa</p>
            <div role="alert">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            </div>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
            }, 3000);
            </script>
            <div class="data">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sortable Table</h4>
                    <div class="card-header-action">
                            <a href="{{ route('pembayaran.create') }}" class="btn btn-info">Tambah Entri</a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Petugas</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Spp</th>
                            <th>Bulan Dibayar</th>
                            <th>Jumlah Bayar</th>
                            <th>Sisa Tunggakan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($pembayaran as $data)
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $data->user_id }}</td>
                            <td>{{ $data->nisn}}</td>
                            <td>{{ $data->siswa->nama}}</td>
                            <td>Rp {{ number_format($data->siswa->spp->nominal, 0, ',', '.') }}</td>
                            <td>{{ $data->bulan_dibayar }} bulan</td>
                            <td>Rp {{ number_format($data->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>{{ $data->total}}</td>
                            <td>{{ $data->tgl_bayar }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                            <form action="{{ route('pembayaran.destroy',$data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light">Delete</button>
                            </form>
                            </td>
                          </tr>
                         @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection

