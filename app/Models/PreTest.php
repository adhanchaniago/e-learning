<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreTest extends Model
{
    protected $table = 'pre_test';

    protected $fillable = [
    	'kelas_virtual_id', 'created_at', 'updated_at'
    ];

    public function kelas() {
    	return $this->belongsTo('App\Models\KelasVirtual', 'kelas_virtual_id', 'id');
    }

    public function soal() {
    	return $this->hasMany('App\Models\PretestSoal', 'pre_test_id', 'id');
    }
}
