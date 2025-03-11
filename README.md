# Module Document

A Laravel package for managing documents within the Manta CMS system.

## Requirements

- PHP ^8.3
- Laravel ^11.0
- Livewire ^3.0
- Manta CMS ^1.0

## Installation

You can install the package via composer:

```bash
composer require darvis/module-document
```

The package will automatically register its service provider.

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="Darvis\ModuleDocument\DocumentServiceProvider" --tag="config"
```

You can also publish the views and migrations:

```bash
php artisan vendor:publish --provider="Darvis\ModuleDocument\DocumentServiceProvider" --tag="views"
php artisan vendor:publish --provider="Darvis\ModuleDocument\DocumentServiceProvider" --tag="migrations"
```

## Features

- Document management system
- Document categorization
- File upload support
- Livewire-powered interface
- Integration with Manta CMS

## Usage

### Routes

The package registers the following routes under the `/cms` prefix:

#### Documents
- List: `GET /cms/{name}`
- Create: `GET /cms/{name}/toevoegen`
- Update: `GET /cms/{name}/aanpassen/{document}`
- Read: `GET /cms/{name}/lezen/{document}`
- Upload: `GET /cms/{name}/bestanden/{document}`

#### Categories
- List: `GET /cms/{name}/categorieen`
- Create: `GET /cms/{name}/categorieen/toevoegen`
- Update: `GET /cms/{name}/categorieen/aanpassen/{documentcat}`
- Read: `GET /cms/{name}/categorieen/lezen/{documentcat}`
- Upload: `GET /cms/{name}/categorieen/bestanden/{documentcat}`

### Models

The package provides three main models:

- `Document`: For managing documents
- `Documentcat`: For managing document categories
- `Documentcatjoin`: For managing document-category relationships

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.