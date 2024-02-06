<?php

namespace PeltonSolutions\FilamentCommon\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTenantCompany
{

	public function tenantCompany(): BelongsTo;

}
