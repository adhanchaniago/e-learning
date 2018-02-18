<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasComment extends Model
{
    protected $table = 'kelas_comment';

    protected $fillable = [
    	'kelas_post_id', 'users_account_id', 'konten', 'created_at', 'updated_at'
    ];

    public function post() {
    	return $this->belongsTo('App\Models\KelasPost', 'kelas_post_id', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
