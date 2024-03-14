<?php

namespace PeltonSolutions\FilamentCommon\Contracts;

use PeltonSolutions\FilamentCommon\Interfaces\HasName;

interface CanHavePossessions extends HasName
{

	static public function getCurrent(): ?self;

	public function addPossession(CanBePossessed $possession);

	public function getKey();

}