<?php

namespace PeltonSolutions\FilamentCommon\Filament\Concerns;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PeltonSolutions\FilamentCommon\Interfaces\HasTimezone;

trait FormatsTimestamp
{
    protected static function timestampFormatter(): Closure
    {
        return function ($state) {
            if (! $state) {
                return '';
            }

            $date = Carbon::parse($state);
            $user = auth()->user();

            if ($user instanceof HasTimezone) {
                $date->timezone($user->getTimezone());
            }

            return $date->locale(App::getLocale())
                ->translatedFormat(trans('pelton-solutions-common::date_formats.datetime'));
        };
    }
}
