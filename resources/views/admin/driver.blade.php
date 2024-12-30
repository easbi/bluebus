@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Driver</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Driver</th>
                        <th>No HP/ Whatsapp</th>
                        <th>Email</th>
                        <th>Waktu Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                                        
                    @foreach ($driver as $driver)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $driver->nama_pemesan }}</td>
                        <td>{{ $driver->no_hp_wa }}</td>
                        <td>{{ $driver->lokasi_tujuan }}</td>
                        <td>{{ $driver->lokasi_jemput }}</td>
                        <td>{{ $driver->tanggal_penjemputan }}</td>
                        <td>{{ $driver->tanggal_kembali }}</td>
                        <td>{{ $driver->created_at }}</td>
                        <td>{{ $driver->name }}</td>
                        <td>
                            <form action="{{ route('driver.destroy',$driver->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('driver.edit',$driver->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>                                 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection