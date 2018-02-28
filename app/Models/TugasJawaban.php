<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasJawaban extends Model
{
    protected $table = 'tugas_jawaban';

    protected $fillable = [
    	'tugas_post_id', 'users_account_id', 'file_tugas', 'keterangan', 'created_at', 'updated_at'
    ];

    public function tugas_post() {
    	return $this->belongsTo('App\Models\TugasPost', 'tugas_post_id', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }

    public function tugas_nilai() {
        return $this->hasMany('App\Models\TugasJawaban', 'tugas_jawaban_id', 'id');
    }
}
