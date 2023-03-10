@extends('layouts.layout')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{route('petugass.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">User</a></div>
              <div class="breadcrumb-item">Tambah</div>
            </div>
          </div>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
             <form action="{{ route('petugass.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">nisn</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="siswa_id" >
                            <option value=""></option>
                         @foreach($siswa as $data)
                            <option {{ $data->id == old('siswa_id') ? 'selected' : '' }} value="{{ $data->id }}">{{$data->nisn}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama User</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama_petugas" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="username" class="form-control">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="password" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="role" id="role" value="{{ old('role') }}" required>
                           <option value="Admin">Admin</option>
                           <option value="Petugas">Petugas</option>
                           <option value="Siswa">Siswa</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Kirim</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
    </section>
</div>
@endsection
