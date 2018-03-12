<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCounter extends Model
{
    protected $table = 'test_counter';

    protected $fillable = [
    	'users_account_id', 'pre_test_count', 'pos_test_count', 'created_at', 'updated_at'
    ];

    public function users_account() {
    	return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
    }
}
