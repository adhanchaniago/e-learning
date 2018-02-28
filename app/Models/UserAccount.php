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

    public function kelas_post() {
        return $this->hasMany('App\Models\KelasPost', 'users_account_id', 'id');
    }

    public function kelas_comment() {
        return $this->hasMany('App\Models\KelasComment', 'users_account_id', 'id');
    }

    public function forum_post() {
        return $this->hasMany('App\Models\ForumPost', 'users_account_id', 'id');
    }

    public function forum_comment() {
        return $this->hasMany('App\Models\ForumComment', 'users_account_id', 'id');
    }

    public function tugas_jawaban() {
        return $this->hasMany('App\Models\TugasJawaban', 'users_account_id', 'id');
    }

    public function polling_post() {
        return $this->hasMany('App\Models\PollingPost', 'users_account_id', 'id');
    }

    public function polling_hasil() {
        return $this->hasMany('App\Models\PollingHasil', 'users_account_id', 'id');
    }

    public function rewward_to() {
        return $this->hasMany('App\Models\RewardTo', 'users_account_id', 'id');
    }

    public function chat_one() {
        return $this->hasMany('App\Models\ChatRoom', 'users_one_id', 'id');
    }

    public function chat_two() {
        return $this->hasMany('App\Models\ChatRoom', 'users_two_id', 'id');
    }

    public function chat_message() {
        return $this->hasMany('App\Models\ChatMessage', 'users_account_id', 'id');
    }
}
