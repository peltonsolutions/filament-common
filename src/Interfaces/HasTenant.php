<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTenant
{

	static public function whereTenantUuid(string $tenantUUID): \Illuminate\Database\Eloquent\Builder;

	public function tenant(): BelongsTo;

}
