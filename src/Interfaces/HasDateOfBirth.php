<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Support\Carbon;

interface HasDateOfBirth
{
	public function getDateOfBirth(): ?string;

	public function setDateOfBirth(?Carbon $dateOfBirth): void;
}