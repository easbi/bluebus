@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update Data SPJ By Admin</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel SPJ</h6>
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
        
        <form action="{{ route('spj.update', $sprintj->id) }}" method="POST"> 
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name">No SPJ</label>
                <input type="text" class="form-control" id="no_spj" name="no_spj" value="{{$sprintj->no_spj}}" required>
            </div>
            <div class="mb-3">
                <label for="name">Tgl SPJ</label>
                <input type="date" class="form-control" id="tgl_spj" name="tgl_spj" placeholder="Masukkan Nama Anda" value="{{$sprintj->tgl_spj}}" required>
            </div>

            <div class="mb-3">
                <label for="name">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan Nama Anda" value="{{$sprintj->nama_pemesan}}" required>
            </div>

            <div class="mb-3">
                <label for="name">Nomor HP/Whatsapp</label>
                <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa"  value="{{$sprintj->no_hp_wa}}" placeholder="Masukkan Nama Anda" required>
            </div>

            <div class="mb-3">
                <label for="address">Lokasi Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan"  value="{{$sprintj->lokasi_tujuan}}" placeholder="Masukkan Alamat Anda" required>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="address">Lokasi Penjemputan</label>
                <input type="text" class="form-control" id="lokasi_jemput" name="lokasi_jemput"  value="{{$sprintj->lokasi_jemput}}"placeholder="Masukkan Alamat Anda" required>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="tanggal_penjemputan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control" id="tanggal_penjemputan" name="tanggal_penjemputan"  value="{{$sprintj->tanggal_penjemputan}}" required>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{$sprintj->tanggal_kembali}}" required>
              </div>
            </div>

            <div class="mb-3">
                <div class="form-group mb-3">
                    <label for="driver_id">Pilih Driver</label>
                    <select id="driver_id" name="driver_id" class="form-control" required>
                        <option value="" {{ old('pengambil_orderan', $sprintj->driver_id) == NULL ? 'selected' : '' }}>
                            Tidak Ada / Langsung Dari Konsumen ke Web
                        </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" 
                                {{ old('driver_id', $sprintj->driver_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">                
                    <label for="bus_id">Tipe/Armada Bus</label>
                    <select id="bus_id" name="bus_id" class="form-control" required>
                        <option value="" selected>Pilih</option>
                        <option value=""{{ old('jenis_bus', $sprintj->tipe_bus) == NULL ? 'selected' : '' }}>Bebas/Sama Saja</option>
                        @foreach ($bus_type as $bt)
                            <option value="{{ $bt->id }}" {{ old('jenis_bus', $sprintj->bus_id) == $bt->id ? 'selected' : '' }}>
                                {{ $bt->armada }}
                            </option>
                        @endforeach
                    </select>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="lama_sewa">Lama Penyewaan (Hari)</label>
                <input type="text" class="form-control" id="lama_sewa" name="lama_sewa" value="{{$sprintj->lama_sewa}}" required>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="tarif_sewa">Tarif Penyewaan (Rp)</label>
                <input type="text" class="form-control" id="tarif_sewa" name="tarif_sewa" value="{{$sprintj->tarif_sewa}}" required>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="down_payment">DP Penyewaan (Rp)</label>
                <input type="text" class="form-control" id="down_payment" name="down_payment" value="{{$sprintj->down_payment}}" required>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="jml_setoran">Jumlah Setoran (Rp)</label>
                <input type="text" class="form-control" id="jml_setoran" name="jml_setoran" value="{{$sprintj->jml_setoran}}" required>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-group mb-3">
                <label for="tgl_setoran">Tgl Setoran</label>
                <input type="date" class="form-control" id="tgl_setoran" name="tgl_setoran" value="{{$sprintj->tgl_setoran}}" required>
              </div>
            </div>



            <div class="mb-3">
                <div class="form-group mb-3 d-flex justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('spj.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
