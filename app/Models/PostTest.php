<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTest extends Model
{
    protected $table = 'post_test';

    protected $fillable = [
    	'kelas_virtual_id', 'created_at', 'updated_at'
    ];

    public function kelas() {
    	return $this->belongsTo('App\Models\KelasVirtual', 'kelas_virtual_id', 'id');
    }

    public function soal() {
    	return $this->hasMany('App\Models\PosttestSoal', 'post_test_id', 'id');
    }
}
