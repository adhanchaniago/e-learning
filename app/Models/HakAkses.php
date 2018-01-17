<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    protected $table = 'hak_akses';

    protected $fillable = [
        'nama', 'slug', 'deskripsi', 'created_at', 'updated_at'
    ];

    public function user_account() {
        return $this->hasMany('App\Models\UserAccount', 'hak_akses_id', 'id');
    }
}
