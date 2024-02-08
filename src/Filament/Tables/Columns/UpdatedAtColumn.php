<?php

namespace PeltonSolutions\FilamentCommon\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PeltonSolutions\FilamentCommon\Interfaces\HasTimezone;

class UpdatedAtColumn extends TextColumn
{
	public static function make(string $name = 'updated_at'): static
	{
		return parent::make($name)
					 ->label(__('pelton-solutions-common::fields.updated_at'))
					 ->formatStateUsing(function ($state) {
						 if ($state) {
							 $date = Carbon::parse($state);
							 $user = auth()->user();
							 if ($user instanceof HasTimezone) {
								 $date->timezone($user->getTimezone());
							 }
							 Carbon::setLocale(App::getLocale());
							 return $date->translatedFormat(__('date_formats.datetime'));
						 }
						 return '';
					 })
					 ->sortable()
					 ->toggleable(isToggledHiddenByDefault: true);
	}
}
