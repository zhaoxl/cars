<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
	protected $table = 'car_model';
	
	public function serial()
	{
		return $this->belongsTo('\App\CarSerial', 'serialid', 'serialid');
	}
}
