<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AngkatanDiklat extends Model
{
    protected $table = 'angkatan_diklat';

    protected $fillable = [
        'nama_diklat', 'tanggal_mulai', 'tanggal_selesai', 'keterangan', 'created_at', 'updated_at'
    ];
}
