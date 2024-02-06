<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PeltonSolutions\FilamentCommon\Models\Tenant;

interface HasTenants
{

	static public function whereTenantUuid(string $tenantUUID): \Illuminate\Database\Eloquent\Builder;

	public function addToTenant(Tenant|Collection $tenant): void;

	public function tenants(): BelongsToMany;

	public function removeFromTenant(Tenant|Collection $tenant): void;

}
