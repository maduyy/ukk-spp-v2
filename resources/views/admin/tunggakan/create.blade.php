@extends('layouts.layout')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{route('tunggakan.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data Tunggakan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Tunggakan</a></div>
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
             <form action="{{ route('tunggakan.store') }}" method="POST" enctype="multipart/form-data">
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
                        <select class="form-control selectric"  name="siswa_id" required>
                         @foreach($siswa as $data)
                            <option {{ $data->id == old('siswa_id') ? 'selected' : '' }} value="{{ $data->id }}">{{$data->nisn}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="siswa_id" required>
                         @foreach($siswa as $data)
                            <option {{ $data->id == old('siswa_id') ? 'selected' : '' }} value="{{ $data->id }}">{{$data->nama}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">kelas</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="siswa_id" required>
                         @foreach($siswa as $data)
                            <option {{ $data->id == old('siswa_id') ? 'selected' : '' }} value="{{ $data->id }}">{{$data->kelas->nama_kelas}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Spp</label>
                      <div class="col-sm-12 col-md-7"  >
                        <select class="form-control selectric"  name="spp_id" required  id="bil1">
                         @foreach($spp as $data)
                            <option {{ $data->id == old('spp_id') ? 'selected' : '' }} value="{{ $data->id }}" data-nominal="{{ $data->nominal }}">{{ $data->nominal }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan Tunggakan</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="bulan" class="form-control" id="bil2">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" name="total_tunggakan" class="form-control" id="hasil">
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
      <script>
        document.querySelector('#bil2').addEventListener('input', () => {
            const bil1 = parseInt(document.querySelector('#bil1')[document.querySelector('#bil1').selectedIndex].dataset.nominal)
            const bil2 = parseInt(document.querySelector('#bil2').value)
            const hasil = bil1 * bil2
            document.querySelector('#hasil').value = hasil
        })
      </script>
@endsection
