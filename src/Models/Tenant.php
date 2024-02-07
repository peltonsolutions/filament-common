<?php

namespace PeltonSolutions\FilamentCommon\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
	public $incrementing = false;
	protected $primaryKey = 'uuid';
	protected $keyType = 'string';
	
}
