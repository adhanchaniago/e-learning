<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_message';

    protected $fillable = [
    	'chat_room_id', 'users_account_id', 'meesage', 'created_at', 'updated_at'
    ];

    public function chat_room() {
    	return $this->belongsTo('App\Models\ChatRoom', 'chat_room_id', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
