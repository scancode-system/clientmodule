<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\Client;

class ShippingCompany extends Model
{
    protected $fillable = ['id', 'name'];

    public function client()
	{
		return $this->hasOne(Client::class);
	}
}
