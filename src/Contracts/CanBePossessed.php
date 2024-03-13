<?php

namespace PeltonSolutions\FilamentCommon\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use PeltonSolutions\FilamentCommon\Interfaces\HasName;

interface CanBePossessed
{
	
	public function ownerable(): MorphTo;

	public function hasOwner():bool;

}