<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollingPost extends Model
{
    protected $table = 'polling_post';

    protected $fillable = [
    	'users_account_id', 'judul', 'deskripsi', 'created_at', 'updated_at'
    ];

    public function users_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }

    public function polling_detail() {
    	return $this->hasMany('App\Models\PollingDetail', 'polling_post_id', 'id');
    }
}
