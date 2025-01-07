@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Transaksi SPJ</h1>

<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel SPJ</h6>
    </div>
    <div class="card-body">               
        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Menampilkan pesan error jika ada -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NO SPJ</th>
                        <th>Tgl SPJ</th>
                        <th>Nama Pemesan</th>
                        <th>No HP/ Whatsapp</th>
                        <th>Tujuan</th>
                        <th>Lokasi Penjemputan</th>
                        <th>Tanggal Penjemputan</th>
                        <th>Tanggal Kembali</th>
                        <th>Driver</th>
                        <th>Timestamp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                                        
                    @foreach ($spj as $spj)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $spj->no_spj }}</td>
                        <td>{{ $spj->tgl_spj }}</td>
                        <td>{{ $spj->nama_pemesan }}</td>
                        <td>{{ $spj->no_hp_wa }}</td>
                        <td>{{ $spj->lokasi_tujuan }}</td>
                        <td>{{ $spj->lokasi_jemput }}</td>
                        <td>{{ \Carbon\Carbon::parse($spj->tanggal_penjemputan)->locale('id')->translatedFormat('d-F-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($spj->tanggal_kembali)->locale('id')->translatedFormat('d-F-Y') }}</td>
                        <td>{{ $spj->name }}</td>
                        <td>{{ $spj->created_at }}</td>
                        <td>
                            <form action="{{ route('spj.destroy',$spj->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('spj.edit',$spj->id) }}">Edit</a>
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

@push('scripts')
<!-- Page level plugins -->
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
@endpush