# Extra

This is Laravel Package help during development process by adding extra command to create service repository pattern and creating although classes or interface or Traits Only just by one command

![Image of Yaktocat](https://files.fm/thumb_show.php?i=apqxzkw93)

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
- Factory

#### Result For Command :

- ProductController
- ProductService
- ProductRepository
- ProductRepositoryInterface
- Product
- Migration File ex "2014_10_12_000000_create_products_table.php"
- ProductFactory

#### Result :

![Image of Yaktocat](https://files.fm/thumb_show.php?i=vmrqsqud4)

```
<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{

    protected  $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }


}

```

```
<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{

    protected ProductRepository $ProductRepository;

    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     * Get's a record by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return $this->ProductRepository->get($id);
    }

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function all()
    {
        return  $this->ProductRepository->all();
    }

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id)
    {
       return $this->ProductRepository->delete($id);
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        $this->ProductRepository->update($id, $data);
    }
}


```

```
<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    /**
     * Get's a record by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a record.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}


```

```
<?php


namespace App\Repositories;

use App\Models\Product;


class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get's a record by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Product::find($id);
    }

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id)
    {
        Product::destroy($id);
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        Product::find($id)->update($data);
    }
}

```

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
}


```

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

```

```
<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

```

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
        //
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
