@extends('layouts.layout')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Kelas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Kelas</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Kelas</h2>
            <p class="section-lead">List data kelas dan kompetensi keahlian</p>

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
            }, 1000);
            </script>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sortable Table</h4>
                    <div class="card-header-action">
                            <a href="{{ route('kelas.create') }}" class="btn btn-info">Tambah</a>
                    </div>
                  </div>

                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table  class="table table-striped" style="width:100%" id="data-table"  cellspacing="0">

                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>kompetensi keahlian</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($kelas as $data)
                          <tr>
                           <td>  {{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kelas }}</td>
                            <td>{{ $data->kompetensi_keahlian }}</td>
                            <td>
                            <form action="{{ route('kelas.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('kelas.edit',$data->id) }}">Edit</a>
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
     <script>
        $(document).ready(function () {
    $('#data-table').DataTable();
});
     </script>
@endsection

