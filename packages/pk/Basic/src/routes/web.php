<?php
// Route::get('basic', function(){
//     echo 'Hello, It is working fine.';
// })->name('basic');

Route::get('basic', 'Pk\Basic\BasicController@index')->name('basic');
?>