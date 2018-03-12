<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PretestSoal extends Model
{
    protected $table = 'pretest_soal';

    protected $fillable = [
    	'pre_test_id', 'jenis_soal', 'soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'created_at', 'updated_at'
    ];

    public function test() {
    	return $this->belongsTo('App\Models\PreTest', 'pre_test_id', 'id');
    }

    public function jawaban() {
    	return $this->hasMany('App\Models\PretestJawaban', 'pretest_soal_id', 'id');
    }
}
