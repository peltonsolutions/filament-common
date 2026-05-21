<?php

namespace PeltonSolutions\FilamentCommon\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use PeltonSolutions\FilamentCommon\Filament\Concerns\FormatsTimestamp;

class CreatedAtColumn extends TextColumn
{
    use FormatsTimestamp;

    public static function make(?string $name = null): static
    {
        return parent::make($name ?: 'created_at')
            ->label(trans('pelton-solutions-common::fields.created_at'))
            ->formatStateUsing(static::timestampFormatter())
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true)
        ;
    }
}
