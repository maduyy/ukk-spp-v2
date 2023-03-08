@extends('layouts.layout')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Siswa</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Siswa</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Siswa</h2>
            <p class="section-lead">List data Siswa</p>
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
                    <div class="card-header-action">
                            <a href="{{ route('siswa.create') }}" class="btn btn-info">Tambah</a>
                    </div>
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
                            <th>Alamat</th>
                            <th>Nomor Telp</th>
                            <th>Spp</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($siswa as $data)
                          <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kelas->nama_kelas }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_telp }}</td>
                         <td>Rp {{ number_format($data->spp->nominal, 0, ',', '.') }}</td>
                            <td>
                            <form action="{{ route('siswa.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('siswa.edit',$data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
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

