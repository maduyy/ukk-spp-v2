@extends('layouts.layout')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Tunggakan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Admin</a></div>
              <div class="breadcrumb-item"><a href="#">Tunggakan</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Tunggakan</h2>
            <p class="section-lead">List data tunggakan siswa</p>
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sortable Table</h4>

                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Bulan Tunggakan</th>
                            <th>Total</th>

                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($tunggakan as $data)
                          <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $data->siswa->nis }}</td>
                            <td>{{ $data->siswa->nama }}</td>
                            <td>{{ $data->siswa->kelas->nama_kelas }}</td>
                            <td>{{ $data->sisa_bulan }} bulan</td>
                            <td>Rp {{ number_format($data->sisa_tunggakan, 0, ',', '.') }}</td>

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

