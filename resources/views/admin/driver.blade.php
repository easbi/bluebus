@extends('layouts.template2')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Driver</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Driver</h6>
        <a href="{{ route('admin.drivercreate') }}" class="btn btn-success btn-sm float-right">Tambahkan Driver</a>    
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
                        <th>Status Driver</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                                        
                    @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->no_hp_wa }}</td>
                        <td>{{ $driver->email }}</td>
                        <td>{{ $driver->tgl_bergabung }}</td>
                        <td>{{ $driver->status_driver }}</td>
                        <td>
                            <form action="#" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.driveredit', $driver->id) }}">Edit</a>
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