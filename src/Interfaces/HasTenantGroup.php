<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTenantGroup
{
	static public function whereTenantGroupUuid(string $tenantGroupUuid): \Illuminate\Database\Eloquent\Builder;

	public function tenantGroup(): BelongsTo;

}
