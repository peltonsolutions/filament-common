<?php

namespace PeltonSolutions\FilamentCommon\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PeltonSolutions\FilamentCommon\Interfaces\HasTimezone;

class UpdatedAtView extends TextInput
{
	public static function make(string $name = 'updated_at'): static
	{
		return parent::make($name)
					 ->label(trans('pelton-solutions-common::fields.updated_at'))
					 ->formatStateUsing(function ($state) {
						 if ($state) {
							 $date = Carbon::parse($state);
							 $user = auth()->user();
							 if ($user instanceof HasTimezone) {
								 $date->timezone($user->getTimezone());
							 }
							 Carbon::setLocale(App::getLocale());
							 return $date->translatedFormat(trans('pelton-solutions-common::date_formats.datetime'));
						 }
						 return '';
					 })
					 ->visibleOn('view');
	}
}
