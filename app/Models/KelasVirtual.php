<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasVirtual extends Model
{
    protected $table = 'kelas_virtual';

    protected $fillable = [
        'nama_kelas', 'keterangan', 'status', 'angkatan_diklat_id', 'mata_pelajaran_id', 'users_account_id', 'created_at', 'updated_at'
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

    public function kelas_post() {
        return $this->hasMany('App\Models\KelasPost', 'kelas_virtual_id', 'id');
    }

    public function tugas_post() {
        return $this->hasMany('App\Models\TugasPost', 'kelas_virtual_id', 'id');
    }

    public function reward_to() {
        return $this->hasMany('App\Models\RewardTo', 'kelas_virtual_id', 'id');
    }

    public function pre_test() {
        return $this->hasMany('App\Models\PreTest', 'kelas_virtual_id', 'id');
    }

    public function post_test() {
        return $this->hasMany('App\Models\PostTest', 'kelas_virtual_id', 'id');
    }
}
