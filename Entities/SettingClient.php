<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;

class SettingClient extends Model
{
	protected $table = 'setting_client';
	protected $fillable = ['id', 'client_start', 'corporate_name', 'cpf_cnpj', 'buyer', 'email', 'phone', 'validation_cpf_cnpj'];

	public function getCorporateNameRequiredAttribute()
	{
		return ($this->corporate_name)?'required':'nullable';
	}

	public function getCpfCnpjRequiredAttribute()
	{
		return ($this->cpf_cnpj)?'required':'nullable';
	}

	public function getBuyerRequiredAttribute()
	{
		return ($this->buyer)?'required':'nullable';
	}

	public function getEmailRequiredAttribute()
	{
		return ($this->email)?'required':'nullable';
	}

	public function getPhoneRequiredAttribute()
	{
		return ($this->phone)?'required':'nullable';
	}

	public function getValidationCpfCnpjActiveAttribute()
	{
		return ($this->validation_cpf_cnpj)?'cpf_cnpj':'';
	}

}
