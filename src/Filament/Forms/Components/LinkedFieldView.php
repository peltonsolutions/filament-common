<?php

namespace PeltonSolutions\FilamentCommon\Filament\Forms\Components;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;

abstract class LinkedFieldView extends TextInput
{
	protected ?string $targetName = null;

	public static function make(string $name): static
	{
		$static = app(static::class, ['name' => $name.'_view']);
		$static->configure();
		$static->targetName = $name;
		return $static->visibleOn('view')
					  ->formatStateUsing(
						  function ($state, $record, self $component) {
							  if ($record && $component->targetName) {
								  $state = $record->{$component->targetName};
							  }
							  $relatedRecord = $component->getRelatedRecord($state);
							  if ($relatedRecord) {
								  return $component->displayName($relatedRecord);
							  }
							  return $state ? 'Not Found' : '';
						  }
					  )
					  ->suffixAction(
						  function ($record, self $component) {
							  if ($record && $component->targetName && ($state = $record->{$component->targetName})) {
								  return Action::make('visit')
											   ->icon('heroicon-o-eye')
											   ->url(
												   filled($state) ? $component->getRelateRecordURL($state) : null
											   );
							  }
							  return null;
						  });
	}

	abstract protected function getRelatedRecord(string|int|null $id): ?Model;

	abstract protected function displayName(Model $relatedRecord): string;

	abstract protected function getRelateRecordURL(string|int|null $id): ?string;
}
