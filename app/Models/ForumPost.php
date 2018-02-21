<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $table = 'forum_post';

    protected $fillable = [
    	'users_account_id', 'judul', 'konten', 'created_at', 'updated_at'
    ];

    public function comment() {
    	return $this->hasMany('App\Models\ForumComment', 'forum_post_id', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
