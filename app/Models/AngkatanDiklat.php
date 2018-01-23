<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AngkatanDiklat extends Model
{
    protected $table = 'angkatan_diklat';

    protected $fillable = [
        'nama_diklat', 'tanggal_mulai', 'tanggal_selesai', 'keterangan', 'created_at', 'updated_at'
    ];

    public function angkatan_peserta() {
    	return $this->hasMany('App\Models\AngkatanPeserta', 'angkatan_diklat_id', 'id');
    }
}
