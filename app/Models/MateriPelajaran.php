<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriPelajaran extends Model
{
    protected $table = 'materi_pelajaran';

    protected $fillable = [
        'judul_materi', 'keterangan', 'users_account_id', 'mata_pelajaran_id', 'jenis_file', 'lokasi', 'created_at', 'updated_at'
    ];

    public function mata_pelajaran() {
    	return $this->belongsTo('App\Models\MataPelajaran', 'mata_pelajaran_id', 'id');
    }

    public function users_account() {
    	return $this->belongsTo('App\Models\UserAccount'. 'users_account_id', 'id');
    }
}
