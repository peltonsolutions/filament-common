<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

interface HasEmail
{
	public function getEmail(): ?string;

	public function setEmail(?string $email): void;
}