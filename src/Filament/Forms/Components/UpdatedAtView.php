<?php

namespace PeltonSolutions\FilamentCommon\Filament\Forms\Components;

use Filament\Forms\Components\DateTimePicker;

class UpdatedAtView extends DateTimePicker
{
	public static function make(string $name = 'updated_at'): static
	{
		return parent::make($name)
					 ->label(__('pelton-solutions-common::fields.updated_at'))
			/*->formatStateUsing(function ($state) {
				if ($state) {
					$date = Carbon::parse($state);
					$date->timezone(auth()->user()->timezone);
					Carbon::setLocale(App::getLocale());
					return $date->translatedFormat(__('date_formats.datetime'));
				}
				return '';
			})*/
					 ->visibleOn('view');
	}
}
