@extends('layouts.layout')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{route('siswa.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data Siswa</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Siswa</a></div>
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
             <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nisn</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="nisn" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nis</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="nis" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama" class="form-control">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="kelas_id" required>
                         @foreach($kelas as $data)
                            <option {{ $data->id == old('kelas_id') ? 'selected' : '' }} value="{{ $data->id }}">{{$data->nama_kelas}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="alamat" class="form-control">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telepon</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="no_telp" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SPP</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="spp_id" required>
                         @foreach($spp as $data)
                            <option {{ $data->id == old('spp_id') ? 'selected' : '' }} value="{{ $data->id }}">Rp {{ number_format($data->nominal, 0, ',', '.') }}</option>
                            @endforeach
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
