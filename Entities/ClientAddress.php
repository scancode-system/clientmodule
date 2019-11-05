<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    protected $fillable = ['id', 'client_id', 'street', 'number', 'apartment', 'neighborhood', 'city', 'st', 'postcode'];
}
