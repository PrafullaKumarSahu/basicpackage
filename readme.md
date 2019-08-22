## Basic Service Provider

## Basic Package Development 

1. Create a folder /packages in root folder
2. Every package has a name consists of 2 parts [vendor / creator] / [packagename]
eg:. pk/basic, here "pk" is vendor and "basic" is package name
3. Inside basic directory run composer init
It will ask some questions to create composer.json file for your basic package, something like


<code>
{
    "name": "pk/basic",
    "description": "Basic package for learning",
    "authors": [
        {
            "name": "prafullakumarsahu",
            "email": "prafullakumarsahu001@gmail.com"
        }
    ],
    "require": {},
    "minimum-stability": "stable",
}
</code>

4. In main composer.json (project root folder)

Make our package visible

 "repositories": [
    {
        "type": "path",
        "url": "./packages/pk/basic/",
        "options": {
            "symlink": true 
        }
    }
   "require": {
        "php": "^7.1.3",
        "fideloper/proxy": "^4.0",
        "laravel/framework": "5.8.*",
        "laravel/passport": "^7.2",
        "laravel/tinker": "^1.0",
        "pk/basic": "dev-master"
    },

5. run composer update

6. Creating a service provider

Run artisan command php artisan make:provider BasicServiceProvider, it will generate a BasicServiceProvider.php file in app/providers, let's move this to packages/pk/basic/src directory and then change the namespace at top of the file

7. From Laravel 5.5 there's a great function called auto-discovery, so in package's composer.json

Add

 "autoload": {
        "psr-4": {
          "Pk\\": "src/"
        }
      },
    "extra": {
        "laravel": {
            "providers": [
                "Pk\\Basic\\BasicServiceProvider"
            ]
        }
    }

8. Create a controller, suing artisan command php artisan make:controller BasicControlller and move to packages/pk/basic/src directory and change the namespace at top of the file

9. In side packages/pk/basic/src create a directory called routes/ and inside that create file web.php 

Now add a route

Route::get('basic', 'Pk\Basic\BasicController@index')->name('basic');

10. In BasicController index method 

return 'Hello, I am your basic package.';

11. In BasicServiceProvider register() method

public function register()
{
    $this->app->make('Pk\Basic\BasicController');
}

and in boot() method

public function boot()
{
    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
}

12. Now run php artisan serve and visit 127.0.0.1:8000/basic