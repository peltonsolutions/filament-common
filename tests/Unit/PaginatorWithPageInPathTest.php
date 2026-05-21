<?php

use Illuminate\Support\Collection;
use PeltonSolutions\FilamentCommon\Models\PaginatorWithPageInPath;

test('url generates a path-based page url', function () {
    $paginator = new PaginatorWithPageInPath(
        items: new Collection([]),
        total: 100,
        perPage: 10,
        currentPage: 1,
        options: ['path' => '/items'],
    );

    expect($paginator->url(3))->toBe('/items/page/3');
});

test('url has no query string when no extra params exist', function () {
    $paginator = new PaginatorWithPageInPath(
        items: new Collection([]),
        total: 100,
        perPage: 10,
        currentPage: 1,
        options: ['path' => '/items'],
    );

    expect($paginator->url(1))->toBe('/items/page/1');
});

test('url preserves extra query parameters', function () {
    $paginator = new PaginatorWithPageInPath(
        items: new Collection([]),
        total: 100,
        perPage: 10,
        currentPage: 1,
        options: ['path' => '/items', 'query' => ['search' => 'foo', 'sort' => 'name']],
    );

    $url = $paginator->url(2);

    expect($url)
        ->toContain('/items/page/2')
        ->toContain('search=foo')
        ->toContain('sort=name');
});

test('url excludes the page parameter from the query string', function () {
    $paginator = new PaginatorWithPageInPath(
        items: new Collection([]),
        total: 100,
        perPage: 10,
        currentPage: 1,
        options: ['path' => '/items', 'query' => ['page' => 5, 'search' => 'foo']],
    );

    $url = $paginator->url(2);

    expect($url)
        ->not->toContain('page=')
        ->toContain('search=foo');
});

test('url appends a fragment when one is set', function () {
    $paginator = new PaginatorWithPageInPath(
        items: new Collection([]),
        total: 100,
        perPage: 10,
        currentPage: 1,
        options: ['path' => '/items', 'fragment' => 'results'],
    );

    expect($paginator->url(2))->toBe('/items/page/2#results');
});

test('getCurrentPage returns the current page number', function () {
    $paginator = new PaginatorWithPageInPath(
        items: new Collection([]),
        total: 100,
        perPage: 10,
        currentPage: 5,
        options: ['path' => '/items'],
    );

    expect($paginator->getCurrentPage())->toBe(5);
});
