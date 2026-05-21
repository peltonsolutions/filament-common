<?php

namespace PeltonSolutions\FilamentCommon;

use Illuminate\Support\ServiceProvider;

class FilamentCommonServiceProvider extends ServiceProvider
{
	public function register(): void {}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'pelton-solutions-common');
	}
}
