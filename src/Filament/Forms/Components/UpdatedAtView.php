<?php

namespace PeltonSolutions\FilamentCommon\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use PeltonSolutions\FilamentCommon\Filament\Concerns\FormatsTimestamp;

class UpdatedAtView extends TextInput
{
    use FormatsTimestamp;

    public static function make(?string $name = null): static
    {
        return parent::make($name ?: 'updated_at')
            ->label(trans('pelton-solutions-common::fields.updated_at'))
            ->formatStateUsing(static::timestampFormatter())
            ->visibleOn('view')
        ;
    }
}
