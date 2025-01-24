@extends('layouts.template2')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Data Driver Baru</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Driver</h6>
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
        <form action="{{ route('admin.driverstore') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp_wa" class="form-label">No HP/WA</label>
                <input type="text" id="no_hp_wa" name="no_hp_wa" class="form-control" value="{{ old('no_hp_wa') }}">
            </div>

            <div class="mb-3">
                <label for="tgl_bergabung" class="form-label">Tanggal Bergabung</label>
                <input type="date" id="tgl_bergabung" name="tgl_bergabung" class="form-control" value="{{ old('tgl_bergabung') }}">
            </div>

            <div class="mb-3">
                <label for="status_driver" class="form-label">Status Driver</label>
                <select id="status_driver" name="status_driver" class="form-control">
                    <option value="AKTIF" {{ old('status_driver') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                    <option value="NON-AKTIF" {{ old('status_driver') == 'NON-AKTIF' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password baru" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.driver') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
