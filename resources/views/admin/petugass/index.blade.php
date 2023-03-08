@extends('layouts.layout')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">User</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data User</h2>
            <p class="section-lead">List data admin petugas dan siswa</p>
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
                            <a href="{{ route('petugass.create') }}" class="btn btn-info">Tambah</a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>

                            <th>Nama User</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($petugas as $data)
                          <tr>
                           <td>  {{ $loop->iteration }}</td>

                            <td>{{ $data->nama_petugas }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->role }}</td>
                            <td>
                            <form action="{{ route('petugass.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('petugass.edit',$data->id) }}">Edit</a>
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

