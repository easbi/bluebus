<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprintj extends Model
{
    use HasFactory;
    protected $table = 'spj';
    protected $fillable=[
        'booking_id',
        'no_spj',
        'tgl_spj',
        'nama_pemesan',
        'no_hp_wa',
        'lokasi_tujuan',
        'lokasi_jemput',
        'tanggal_penjemputan',
        'tanggal_kembali',
        'driver_id',
        'bus_id',
        'lama_sewa',
        'tarif_sewa',
        'down_payment',
        'jml_setoran',
        'tgl_setoran',
        'created_by',
    ];
}
