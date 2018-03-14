<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosttestSoal extends Model
{
    protected $table = 'posttest_soal';

    protected $fillable = [
    	'post_test_id', 'jenis_soal', 'soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'created_at', 'updated_at'
    ];

    public function test() {
    	return $this->belongsTo('App\Models\PostTest', 'post_test_id', 'id');
    }

    public function jawaban() {
    	return $this->hasMany('App\Models\PosttestJawaban', 'posttest_soal_id', 'id');
    }
}
