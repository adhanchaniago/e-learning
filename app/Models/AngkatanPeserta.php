<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AngkatanPeserta extends Model
{
    protected $table = 'angkatan_peserta';

    protected $fillable = [
        'angkatan_diklat_id', 'users_account_id', 'created_at', 'updated_at'
    ];

    public function angkatan_diklat() {
    	return $this->belongsTo('App\Models\AngkatanDiklat', 'angkatan_diklat_id', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
