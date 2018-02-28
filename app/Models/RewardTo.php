<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardTo extends Model
{
    protected $table = 'reward_to';

    protected $fillable = [
    	'kelas_virtual_id', 'users_account_id', 'reward_list_id', 'created_at', 'updated_at'
    ];

    public function kelas_virtual() {
    	return $this->belongsTo('App\Models\RewardTo', 'kelas_virtual_id', 'id');
    }

    public function users_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }

    public function reward_list() {
    	return $this->belongsTo('App\Models\RewardList', 'reward_list_id', 'id');
    }
}
