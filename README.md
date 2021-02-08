# Extra

This is Laravel Package help during development process by adding extra command to create service repository pattern and creating although classes or interface or Traits Only just by one command

## Installation

Use the package manager [composer](https://getcomposer.org/) to install extra.

```bash
composer require ahmedhakeem/extra
```

## Configuration

Publish the configuration file

This step is required

```
php artisan vendor:publish --provider="Hakeem\Extra\ExtraServiceProvider"
```

## Uasge

### Service Repository Pattern Command:

The follwoing commads each one will create different thing

This Command will Create Service Repository Pattern Full Development Line Start From Migration To Controller

```
php artisan extra:sr  Product
```

#### Classes that Will Created:

- Controller
- Service Class
- Repository Class
- Repository Interface
- Model
- Migration file

#### Result For Command :

- ProductController
- ProductService
- ProductRepository
- ProductRepositoryInterface
- Product
- Migration File ex "2014_10_12_000000_create_products_table.php"

#### Result :

![Image of Yaktocat](https://lh6.googleusercontent.com/7Lg2APU9zQd7HoIZ2H45egM5kpHVUofReWsrffbF63TUF1hl4CisYwYbCTKk-tkCY8LXGXppmQZLPH6GZ6-B=w1848-h947-rw)

#### After This you need to add result from terminal to AppServiceProvider as the following :

```
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

```

### Create Class Command Command:

```
php artisan extra:class  {nameSpace}/{className}
```

This will create Class inside Make Folder in app folder and path will be like this : "app\namespace\ClassName"

#### Ex:

```
php artisan extra:class  Helpers/VatCalculator
```

This will create class VatCalculator inside Helpers folder in app folder

### Create Interface Command Command:

```
php artisan extra:interface  {nameSpace}/{interfaceName}
```

This will create Class inside Make Folder in app folder and path will be like this : "app\namespace\interfaceName"

#### Ex:

```
php artisan extra:interface  Helpers/VatCalculatorInterface
```

This will create interface VatCalculator inside Helpers folder in app folder

### Create Trait Command Command:

```
php artisan extra:interface  {nameSpace}/{traitName}
```

This will create Class inside Make Folder in app folder and path will be like this : "app\namespace\traitName"

#### Ex:

```
php artisan extra:trait  Helpers\VatCalculatorTrait
```

This will create Trait VatCalculator inside Helpers folder in app folder

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
