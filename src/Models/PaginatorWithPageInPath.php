<?php

namespace PeltonSolutions\FilamentCommon\Models;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class PaginatorWithPageInPath extends LengthAwarePaginator
{
	public function url($page): string
	{
		$query = Arr::except($this->query, $this->pageName);
		$queryString = count($query) ? '?' . Arr::query($query) : '';

		return $this->path . '/page/' . $page . $queryString . $this->buildFragment();
	}

	public function getCurrentPage(): int
	{
		return $this->currentPage;
	}
}
