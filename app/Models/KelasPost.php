<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasPost extends Model
{
    protected $table = 'kelas_post';

    protected $fillable = [
    	'users_account_id', 'kelas_virtual_id', 'konten', 'sisipan', 'lokasi_sisipan', 'created_at', 'updated_at'
    ];

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }

    public function comment() {
    	return $this->hasMany('App\Models\KelasComment', 'kelas_post_id', 'id');
    }

    public function kelas_virtual() {
        return $this->belongsTo('App\Models\KelasVirtual', 'kelas_virtual_id', 'id');
    }
}
