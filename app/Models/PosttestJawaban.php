<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosttestJawaban extends Model
{
    protected $table = 'posttest_jawaban';
	public $timestamps = false;

	protected $fillable = [
		'users_account_id', 'posttest_soal_id', 'jawaban', 'nilai'
	];

	public function users_account() {
		return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
	} 

	public function soal() {
		return $this->belongsTo('App\Models\PosttestSoal', 'posttest_soal_id', 'id');
	}
}
