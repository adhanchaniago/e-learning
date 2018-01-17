<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfil extends Model
{
    protected $table = 'users_profil';

    protected $fillable = [
        'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'telepon', 
        'photo', 'kantor_cabang_id', 'created_at', 'updated_at'
    ];

    public function user_account(){
        return $this->belongsTo('App\Models\UserAccount', 'id');
    }

    public function kantor_cabang(){
        return $this->belongsTo('App\Models\KantorCabang', 'kantor_cabang_id', 'id');
    }
}
