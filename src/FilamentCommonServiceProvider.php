<?php

namespace PeltonSolutions\FilamentCommon;

use Illuminate\Support\ServiceProvider;

class FilamentCommonServiceProvider extends ServiceProvider
{
	public function register(): void
	{

	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pelton-solutions-common');
	}
}