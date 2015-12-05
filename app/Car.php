<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

	protected $fillable = ['user_id', 'model_id', 'insurance_companie_id', 'buy_at', 'buy_address', 'check_at', 'maintain_at', 'identifier', 'engine_code', 'certificate', 'insurance_quantity', 'insurance_at', 'insurance_content'];
	

	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function insurance_company()
	{
		return $this->belongsTo('\App\InsuranceCompany', 'insurance_companie_id', 'id');
	}
	
	public function model()
	{
		return $this->belongsTo('\App\CarModel', 'model_id', 'id');
	}
	
	public function carName()
	{
		$model = $this->model;
		$result = "";
		if(!is_null($model))
		{
			$result = $model->modelname;
			$serial = $model->serial;
			if(!is_null($serial))
			{
				$result = $serial->brandtype.'  '.$serial->serialname.'  '.$result;
			}
		}
		
		return $result;
	}
	
	public function insuranceCompanyName()
	{
		$company = $this->insurance_company;
		$result = "";
		if(!is_null($company))
		{
			$result = $company->name;
		}
		
		return $result;
	}
	
	public function insuranceCompanyTel()
	{
		$company = $this->insurance_company;
		$result = "";
		if(!is_null($company))
		{
			$result = $company->tel;
		}
		
		return $result;
	}
}
