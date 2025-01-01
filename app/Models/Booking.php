<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable=[
        'nama_pemesan',
        'no_hp_wa',
        'lokasi_tujuan',
        'lokasi_jemput',
        'tanggal_penjemputan',
        'tanggal_kembali',
        'created_by',
        'tipe_bus',
    ];
}
