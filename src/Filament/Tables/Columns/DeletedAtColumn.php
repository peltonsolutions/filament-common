<?php

namespace PeltonSolutions\FilamentCommon\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use PeltonSolutions\FilamentCommon\Filament\Concerns\FormatsTimestamp;

class DeletedAtColumn extends TextColumn
{
    use FormatsTimestamp;

    public static function make(?string $name = null): static
    {
        return parent::make($name ?: 'deleted_at')
            ->label(trans('pelton-solutions-common::fields.deleted_at'))
            ->formatStateUsing(static::timestampFormatter())
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true)
        ;
    }
}
