@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update Data Driver By Admin</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.driverupdate', $driver->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $driver->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $driver->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp_wa" class="form-label">No HP/WA</label>
                <input type="text" id="no_hp_wa" name="no_hp_wa" class="form-control" value="{{ old('no_hp_wa', $driver->no_hp_wa) }}">
            </div>

            <div class="mb-3">
                <label for="tgl_bergabung" class="form-label">Tanggal Bergabung</label>
                <input type="date" id="tgl_bergabung" name="tgl_bergabung" class="form-control" value="{{ old('tgl_bergabung', $driver->tgl_bergabung) }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.driver') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
