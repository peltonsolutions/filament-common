<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

interface HasFilamentLink
{

	/**
	 * Get the link of the item, or null if none exists
	 */
	public function getFilamentLink(): ?string;

}
