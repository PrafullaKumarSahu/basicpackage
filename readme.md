## To test casecade delet update

* Set up the project
* Use <code>php artisan migrate</code>, now you are having User and Post models
* Use <code>php artisan db:seed</code>, that will create posts and associated users
* Now try deleting any user having posts, it will also delete the posts related to them 

## You can use tinker to see and delete users
* Use command <code>php artisan tinker</code> to start tinker
* <code>App\User::all()->with('posts')</code> to see users with posts
* <code>App\User::find(<some user id having post>)->delete()</code> will delete user and their posts
