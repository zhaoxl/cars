<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{

	protected $fillable = ['user_id', 'name', 'number', 'category', 'receive_at', 'check_at'];
	

	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function safeNumber()
	{
		return substr_replace($this->number,"***",4,8);
	}
	
}
