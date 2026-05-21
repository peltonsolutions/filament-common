<?php

namespace PeltonSolutions\FilamentCommon\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use PeltonSolutions\FilamentCommon\Filament\Concerns\FormatsTimestamp;

class UpdatedAtColumn extends TextColumn
{
    use FormatsTimestamp;

    public static function make(?string $name = null): static
    {
        return parent::make($name ?: 'updated_at')
            ->label(trans('pelton-solutions-common::fields.updated_at'))
            ->formatStateUsing(static::timestampFormatter())
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true)
        ;
    }
}
