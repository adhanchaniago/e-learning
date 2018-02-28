<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table = 'chat_room';

    protected $fillable = [
    	'users_one_id', 'users_two_id', 'created_at', 'updated_at'
    ];

    public function user_one() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_one_id', 'id');
    }

    public function user_two() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_two_id', 'id');
    }
}
