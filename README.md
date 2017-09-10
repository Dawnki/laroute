# laroute
Auto generate Laravel router's statement by phpdoc


## Usage

  1. Import the vendor

```php
composer require dawnki/laroute
```

  2. write the phpdoc in Laravel controller
  
```php
class TestController {
    /**
     *  @method GET
     *  @route  /test
     */
    function test()
    {
        // your code
    }
}
```

  3. call the generator to get the route statements
  
```php
    $generator =  new \dawnki\laroute\Generate();
    $generator->getOne(\App\Http\Controller\TestController::class)->display();
```

  it will be export that:
  
```
Route::get('/test',['uses'=>'TestController@test']);
...
...
```

  and copy these route statements to route
  
## Todo

  * Directly export the statements to route file
  * Support multi files(controllers)

## License
MIT