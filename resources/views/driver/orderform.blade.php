@extends('layouts.template3')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Catat Bookingan dari Driver</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Booking oleh Driver</h6>
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Menampilkan error khusus -->
    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST"> 
      @csrf
      <div class="mb-3">
        <label for="name">Nama Pemesan</label>
        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan Nama Anda" required>
      </div>

      <div class="mb-3">
        <label for="name">Nomor HP/Whatsapp</label>
        <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa" placeholder="Masukkan Nama Anda" required>
      </div>

      <div class="mb-3">
        <label for="address">Lokasi Tujuan</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Alamat Anda" required>
      </div>

      <div class="mb-3">
        <div class="form-group mb-3">
          <label for="address">Lokasi Penjemputan</label>
          <input type="text" class="form-control" id="lokasi_jemput" name="lokasi_jemput" placeholder="Masukkan Alamat Anda" required>
        </div>

        <div class="mb-3">
          <div class="form-group mb-3">
            <label for="tanggal_penjemputan">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" id="tanggal_penjemputan" name="tanggal_penjemputan" required>
          </div>
        </div>

        <div class="mb-3">
          <div class="form-group mb-3">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
          </div>
        </div>

        <div class="form-group mb-3">                
          <label for="jenis_bus">Tipe/Armada Bus</label>
          <select id="jenis_bus" name="jenis_bus" class="form-control" required>
            <option value="" selected>Pilih</option>
            <option value="">Bebas/Sama Saja</option>
            @foreach ($bus_type as $bt)
            <option value="{{ $bt->id }}">
              {{ $bt->armada }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <div class="form-group mb-3 d-flex justify-content-between">
            <div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('driver.index') }}" class="btn btn-secondary">Batal</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection
