<?php

namespace PeltonSolutions\FilamentCommon\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class CreatedAtColumn extends TextColumn
{
	public static function make(string $name = 'created_at'): static
	{
		return parent::make($name)
					 ->label(__('pelton-solutions-common::fields.created_at'))
			/*->formatStateUsing(function ($state) {
				if ($state) {
					$date = Carbon::parse($state);
					$date->timezone(auth()->user()->timezone);
					Carbon::setLocale(App::getLocale());
					return $date->translatedFormat(__('date_formats.datetime'));
				}
				return '';
			})*/
					 ->sortable()
					 ->toggleable(isToggledHiddenByDefault: true);
	}
}
