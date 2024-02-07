<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasTenants
{

	static public function whereTenantUuid(string $tenantUUID): \Illuminate\Database\Eloquent\Builder;

	/*public function addToTenant(Tenant|Collection $tenant): void;*/

	public function tenants(): BelongsToMany;

	/*public function removeFromTenant(Tenant|Collection $tenant): void;*/

}
