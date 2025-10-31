<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTenant
{

	public static function whereTenantUuid(string $tenantUUID): Builder;

	public function tenant(): BelongsTo;

}
