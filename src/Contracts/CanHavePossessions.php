<?php

namespace PeltonSolutions\FilamentCommon\Contracts;

use PeltonSolutions\FilamentCommon\Interfaces\HasName;

interface CanHavePossessions extends HasName
{

	public function addPossession(CanBePossessed $possession);

	public function getKey();

}