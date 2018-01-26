<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasVirtual extends Model
{
    protected $table = 'kelas_virtual';

    protected $fillable = [
        'nama_kelas', 'angkatan_diklat_id', 'mata_pelajaran_id', 'users_account_id', 'created_at', 'updated_at'
    ];

    public function angkatan_diklat() {
    	return $this->belongsTo('App\Models\AngkatanDiklat', 'angkatan_diklat_id', 'id');
    }

    public function mata_pelajaran() {
    	return $this->belongsTo('App\Models\MataPelajaran', 'mata_pelajaran_id', 'id');
    }

    public function users_account()
    {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
