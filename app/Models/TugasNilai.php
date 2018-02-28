<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasNilai extends Model
{
    protected $table = 'tugas_nilai';

    protected $fillable = [
    	'tugas_jawaban_id', 'nilai', 'created_at', 'updated_at'
    ];

    public function tugas_jawaban() {
    	return $this->belongsTo('App\Models\TugasJawaban', 'tugas_jawaban_id', 'id');
    }
}
