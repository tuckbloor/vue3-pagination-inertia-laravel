Simple Pagination For Laravel when using Inertia js with vue3

To Install run

npm i tb-vue3-laravel-lnertia-pagination

you will need to add the following to your routes

Route::match(['GET','POST'],'/test', 'TestController@test')->name('test');


the test uses a database called test in the TestController.php

$data = \DB::table('test')->paginate(5); edit this for your table



axios should be pulled in globally and bootstrap 4 for css pagination