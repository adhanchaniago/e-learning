<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_message';

    protected $fillable = [
    	'sender', 'receiver', 'message', 'last_seein', 'created_at', 'updated_at'
    ];

    public function chat_room() {
    	return $this->belongsTo('App\Models\ChatRoom', 'sender', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'receiver', 'id');
    }
}
