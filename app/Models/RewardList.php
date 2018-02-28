<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardList extends Model
{
    protected $table = 'reward_list';

    protected $fillable = [
    	'nama', 'keterangan', 'gambar', 'created_at', 'updated_at'
    ];

    public function reward_to() {
    	return $this->hasMany('App\Models\RewardTo', 'reward_list_id', 'id');
    }
}
