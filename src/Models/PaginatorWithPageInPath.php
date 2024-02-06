<?php

namespace PeltonSolutions\FilamentCommon\Models;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginatorWithPageInPath extends LengthAwarePaginator
{
	public function url($page): string
	{
		return $this->path.'/page/'.$page;
	}

	public function getCurrentPage(): int
	{
		return $this->currentPage;
	}
}
