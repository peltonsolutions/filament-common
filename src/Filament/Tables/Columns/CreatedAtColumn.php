<?php

namespace PeltonSolutions\FilamentCommon\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PeltonSolutions\FilamentCommon\Interfaces\HasTimezone;

class CreatedAtColumn extends TextColumn
{
	public static function make(string $name = 'created_at'): static
	{
		return parent::make($name)
					 ->label(trans('pelton-solutions-common::fields.created_at'))
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
					 ->sortable()
					 ->toggleable(isToggledHiddenByDefault: true);
	}
}
