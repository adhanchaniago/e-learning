<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_account';

    protected $fillable = [
        'username', 'password', 'hak_akses_id', 'status', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function user_profil(){
        return $this->hasOne('App\Models\UserProfil', 'id');
    }

    public function hak_akses() {
        return $this->belongsTo('App\Models\HakAkses', 'hak_akses_id', 'id');
    }

    public function angkatan_peserta() {
        return $this->hasMany('App\Models\AngkatanPeserta', 'users_account_id', 'id');
    }

    public function kelas_virtual() {
        return $this->hasMany('App\Models\KelasVirtual', 'users_account_id', 'id');
    }

    public function materi_pelajaran() {
        return $this->hasMany('App\Models\MateriPelajaran', 'users_account_id', 'id');
    }
}
