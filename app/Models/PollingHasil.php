<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollingHasil extends Model
{
    protected $table = 'polling_hasil';

    protected $fillable = [
    	'polling_detail_id', 'users_account_id', 'created_at', 'updated_at'
    ];

    public function polling_detail() {
    	return $this->belongsTo('App\Models\PollingDetail', 'polling_detail_id', 'id');
    }

    public function user_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
