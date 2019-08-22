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

<code>
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
</code>

5. <code>run composer update</code>

6. Creating a service provider

Run artisan command <code>php artisan make:provider BasicServiceProvider</code>, it will generate a <code>BasicServiceProvider.php</code> file in <code>app/providers</code>, let's move this to packages/<code>pk/basic/src</code> directory and then change the namespace at top of the file

7. From Laravel 5.5 there's a great function called auto-discovery, so in package's composer.json

Add

<code>

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
</code>

8. Create a controller, suing artisan command <code>php artisan make:controller BasicControlller</code> and move to <code>packages/pk/basic/src</code> directory and change the namespace at top of the file

9. In side <code>packages/pk/basic/src</code> create a directory called <code>routes/</code> and inside that create file <code>web.php</code> 

Now add a route

<code>
Route::get('basic', 'Pk\Basic\BasicController@index')->name('basic');
</code>

10. In <code>BasicController<code/>'s  <code>index()</code> method 

<code>
return 'Hello, I am your basic package.';
</code>

11. In <code>BasicServiceProvider</code> register() method

<code>
public function register()
{
    $this->app->make('Pk\Basic\BasicController');
}
</code>

and in <code>boot()</code> method

<code>
public function boot()
{
    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
}
</code>

12. Now run <code>php artisan serve</code> and visit <code>127.0.0.1:8000/basic</code>