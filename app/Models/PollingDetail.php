<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    protected $table = 'polling_detail';

    protected $fillable = [
    	'polling_post_id', 'deskripsi', 'created_at', 'updated_at'
    ];

    public function polling_post() {
    	return $this->belongsTo('App\Models\PollingPost', 'polling_post_id', 'id');
    }

    public function polling_hasil() {
    	return $this->hasMany('App\Models\PollingHasil', 'polling_detail_id', 'id');
    }
}
