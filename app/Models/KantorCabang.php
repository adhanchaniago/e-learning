<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KantorCabang extends Model
{
    protected $table = 'kantor_cabang';

    protected $fillable = [
        'nama', 'alamat', 'telepon', 'created_at', 'updated_at'
    ];

    public function user_profil(){
        return $this->hasMany('App\Models\UserProfil', 'kantor_cabang_id', 'id');
    }
}
