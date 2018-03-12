<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PretestJawaban extends Model
{
	protected $table = 'pretest_jawaban';
	public $timestamps = false;

	protected $fillable = [
		'users_account_id', 'pretest_soal_id', 'jawaban', 'nilai'
	];

	public function users_account() {
		return $this->belongsTo('App\Models\UserAccount', 'users_account_id', 'id');
	} 

	public function soal() {
		return $this->belongsTo('App\Models\PretestSoal', 'pretest_soal_id', 'id');
	}
}
