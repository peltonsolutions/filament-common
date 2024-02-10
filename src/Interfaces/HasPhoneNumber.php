<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

interface HasPhoneNumber
{
	public function getPhoneNumber(): ?string;

	public function setPhoneNumber(?string $phoneNumber): void;
}