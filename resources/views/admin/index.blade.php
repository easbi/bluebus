@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Transaksi Booking</h1>

<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan</h6>
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
                        <th>Nama Pemesan</th>
                        <th>No HP/ Whatsapp</th>
                        <th>Tujuan</th>
                        <th>Lokasi Penjemputan</th>
                        <th>Tanggal Penjemputan</th>
                        <th>Tanggal Kembali</th>
                        <th>Pengambil Orderan</th>
                        <th>Timestamp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                                        
                    @foreach ($booking as $booking)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $booking->nama_pemesan }}</td>
                        <td>{{ $booking->no_hp_wa }}</td>
                        <td>{{ $booking->lokasi_tujuan }}</td>
                        <td>{{ $booking->lokasi_jemput }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_penjemputan)->locale('id')->translatedFormat('d-F-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_kembali)->locale('id')->translatedFormat('d-F-Y') }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d-M-Y H:i:s') }} WIB</td>
                        <td>
                            <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('booking.edit',$booking->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                            
                            <!-- Cek apakah booking_id sudah ada di tabel SPJ -->
                            @php
                                $existingSpj = \App\Models\Sprintj::where('booking_id', $booking->id)->first();
                            @endphp

                            <!-- Jika tidak ada data di tabel SPJ, tampilkan tombol Teruskan ke SPJ -->
                            @if (!$existingSpj)
                                <form action="{{ route('spj.store2', $booking->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Buat SPJ</button>
                                </form>
                            @else
                                <!-- Tampilkan pesan jika sudah ada data di tabel SPJ -->
                                <span class="text-danger">SPJ sudah dibuat untuk booking ini</span>
                            @endif                                
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