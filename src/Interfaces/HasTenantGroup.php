<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTenantGroup
{
	public static function whereTenantGroupUuid(string $tenantGroupUuid): Builder;

	public function tenantGroup(): BelongsTo;
}
