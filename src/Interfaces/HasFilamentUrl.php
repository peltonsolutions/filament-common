<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

interface HasFilamentUrl
{

	/**
	 * Get the url of the item, or null if none exists
	 */
	public function getFilamentUrl(): ?string;

}
