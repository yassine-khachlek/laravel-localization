# Laravel Localization

Laravel localization files manager without database.

### Installation

Install wia composer:

```
composer require yk/laravel-localization
```

And add the service provider in config/app.php:

```php
Yk\LaravelLocalization\LaravelLocalizationProvider::class,
```

Publishing the package assets:

```
php artisan vendor:publish --provider="Yk\LaravelLocalization\LaravelLocalizationProvider"
```

### How it work:

After installing the package, you have to access the localization manager using /localization url.

## License

### GPLv2

Copyright (c) 2016 Yassine Khachlek <yassine.khachlek@gmail.com>

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.