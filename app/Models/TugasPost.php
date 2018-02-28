<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasPost extends Model
{
    protected $table = 'tugas_post';

    protected $fillable = [
    	'kelas_virtual_id', 'judul', 'deskripsi', 'created_at' , 'updated_at'
    ];

    public function kelas_virtual() {
    	return $this->belongsTo('App\Models\KelasVirtual', 'kelas_virtual_id', 'id');
    }

    public function tugas_jawaban() {
    	return $this->hasMany('App\Models\TugasJawaban', 'tugas_post_id', 'id');
    }
}
