@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update Data Booking By Admin</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan</h6>
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

        <!-- Menampilkan error khusus "Booking ID sudah ada" -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="{{ route('booking.update', $booking->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan Nama Anda" value="{{$booking->nama_pemesan}}" required>
            </div>

            <div class="mb-3">
                <label for="name">Nomor HP/Whatsapp</label>
                <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa"  value="{{$booking->no_hp_wa}}" placeholder="Masukkan Nama Anda" required>
            </div>

            <div class="mb-3">
                <label for="address">Lokasi Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan"  value="{{$booking->lokasi_tujuan}}" placeholder="Masukkan Alamat Anda" required>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="address">Lokasi Penjemputan</label>
                <input type="text" class="form-control" id="lokasi_jemput" name="lokasi_jemput"  value="{{$booking->lokasi_jemput}}"placeholder="Masukkan Alamat Anda" required>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="tanggal_penjemputan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control" id="tanggal_penjemputan" name="tanggal_penjemputan"  value="{{$booking->tanggal_penjemputan}}" required>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{$booking->tanggal_kembali}}" required>
              </div>
            </div>

            <div class="mb-3">
                <div class="form-group mb-3">
                    <label for="pengambil_orderan">Pengambil Orderan</label>
                    <select id="pengambil_orderan" name="pengambil_orderan" class="form-control" required>
                        <option value="" {{ old('pengambil_orderan', $booking->created_by) == NULL ? 'selected' : '' }}>
                            Tidak Ada / Langsung Dari Konsumen ke Web
                        </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" 
                                {{ old('pengambil_orderan', $booking->created_by) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">                
                    <label for="jenis_bus">Tipe/Armada Bus</label>
                    <select id="jenis_bus" name="jenis_bus" class="form-control" required>
                        <option value="" selected>Pilih</option>
                        <option value=""{{ old('jenis_bus', $booking->tipe_bus) == NULL ? 'selected' : '' }}>Bebas/Sama Saja</option>
                        @foreach ($bus_type as $bt)
                            <option value="{{ $bt->id }}" {{ old('jenis_bus', $booking->tipe_bus) == $bt->id ? 'selected' : '' }}>
                                {{ $bt->armada }}
                            </option>
                        @endforeach
                    </select>
              </div>
            </div>



            <div class="mb-3">
                <div class="form-group mb-3 d-flex justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </form>

        <div class="mb-3">
            <div class="form-group mb-3 d-flex justify-content-between">            
                <div></div>
                <div>
                    <form action="{{ route('spj.store2', $booking->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Teruskan ke SPJ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
