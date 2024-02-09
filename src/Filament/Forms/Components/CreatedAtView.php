<?php

namespace PeltonSolutions\FilamentCommon\Filament\Forms\Components;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PeltonSolutions\FilamentCommon\Interfaces\HasTimezone;

class CreatedAtView extends TextInput
{
	public static function make(string $name = 'created_at'): static
	{
		return parent::make($name)
					 ->label(__('pelton-solutions-common::fields.created_at'))
					 ->formatStateUsing(function ($state) {
						 if ($state) {
							 $date = Carbon::parse($state);
							 $user = auth()->user();
							 if ($user instanceof HasTimezone) {
								 $date->timezone($user->getTimezone());
							 }
							 Carbon::setLocale(App::getLocale());
							 return $date->translatedFormat(__('pelton-solutions-common::date_formats.datetime'));
						 }
						 return '';
					 })
					 ->visibleOn('view');
	}
}
