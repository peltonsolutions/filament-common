<?php

namespace PeltonSolutions\FilamentCommon\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use PeltonSolutions\FilamentCommon\Filament\Concerns\FormatsTimestamp;

class CreatedAtView extends TextInput
{
    use FormatsTimestamp;

    public static function make(?string $name = null): static
    {
        return parent::make($name ?: 'created_at')
            ->label(trans('pelton-solutions-common::fields.created_at'))
            ->formatStateUsing(static::timestampFormatter())
            ->visibleOn('view')
        ;
    }
}
