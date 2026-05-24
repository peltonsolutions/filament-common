# filament-common

A utility package by [Pelton Solutions](https://www.nathanpelton.com) that provides shared interfaces, models, Filament table columns, form components, and translations used across the Pelton Solutions package ecosystem.

## Requirements

- PHP ^8.4
- Laravel ^11.0 | ^12.0 | ^13.0
- Filament ^5.0

## Install

```bash
composer require peltonsolutions/filament-common
```

The service provider is auto-discovered and registers the package's translation files automatically.

## What's Included

### Interfaces

Define contracts your Eloquent models can implement:

| Interface | Method(s) |
| --- | --- |
| `HasDateOfBirth` | `getDateOfBirth()` |
| `HasEmail` | `getEmail()` |
| `HasFilamentUrl` | `getFilamentUrl()` |
| `HasName` | `getName()` |
| `HasPhoneNumber` | `getPhoneNumber()` |
| `HasTenant` | `whereTenantUuid()`, `tenant()` |
| `HasTenantCompany` | `company()` |
| `HasTenantGroup` | `whereTenantUuid()` |
| `HasTenants` | `whereTenantUuid()`, `tenants()` |
| `HasTimezone` | `getTimezone()` |

### Models

**`Tenant`** — Base Eloquent model with UUID primary key (`uuid`).

**`PaginatorWithPageInPath`** — Extends `LengthAwarePaginator` to embed the page number in the URL path (`/items/page/2`) instead of a query string parameter.

### Filament Table Columns

Pre-configured `TextColumn` subclasses that format timestamps using the authenticated user's timezone (if they implement `HasTimezone`) and the active locale:

- `CreatedAtColumn` — sortable, hidden by default
- `UpdatedAtColumn` — sortable, hidden by default
- `DeletedAtColumn` — sortable, hidden by default

```php
use PeltonSolutions\FilamentCommon\Filament\Tables\Columns\CreatedAtColumn;
use PeltonSolutions\FilamentCommon\Filament\Tables\Columns\UpdatedAtColumn;
use PeltonSolutions\FilamentCommon\Filament\Tables\Columns\DeletedAtColumn;

// In your Filament resource's table() method:
CreatedAtColumn::make(),
UpdatedAtColumn::make(),
DeletedAtColumn::make(),
```

### Filament Form Components

Pre-configured `TextInput` subclasses that display read-only timestamp fields on view pages:

- `CreatedAtView` — visible on view pages only
- `UpdatedAtView` — visible on view pages only

```php
use PeltonSolutions\FilamentCommon\Filament\Forms\Components\CreatedAtView;
use PeltonSolutions\FilamentCommon\Filament\Forms\Components\UpdatedAtView;

// In your Filament resource's form() method:
CreatedAtView::make(),
UpdatedAtView::make(),
```

**`LinkedFieldView`** — Abstract `TextInput` for displaying a related record's name with a link to its Filament view page. Extend it and implement three methods:

```php
use PeltonSolutions\FilamentCommon\Filament\Forms\Components\LinkedFieldView;

class UserFieldView extends LinkedFieldView
{
    protected function getRelatedRecord(int|string|null $id): ?Model
    {
        return User::find($id);
    }

    protected function displayName(Model $relatedRecord): string
    {
        return $relatedRecord->name;
    }

    protected function getRelatedRecordURL(int|string|null $id): ?string
    {
        return UserResource::getUrl('view', ['record' => $id]);
    }
}
```

### Translations

Translations are published under the `pelton-solutions-common` namespace. Supported locales: `en`, `pt_BR`.

Files: `buttons`, `date_formats`, `fields`, `notifications`, `resource`.

## Testing

```bash
composer test
```

Tests are written with [Pest](https://pestphp.com).

## Security

If you discover a security vulnerability, please email [security@peltonsolutions.com](mailto:security@peltonsolutions.com) rather than using the issue tracker.

## Credits

- [Nathan Pelton](https://www.nathanpelton.com)

## License

filament-common is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
