<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'slug', 'nama_pelajaran', 'created_at', 'updated_at'
    ];

    public function kelas_virtual() {
    	return $this->hasMany('App\Models\KelasVirtual', 'mata_pelajaran_id', 'id');
    }
}
