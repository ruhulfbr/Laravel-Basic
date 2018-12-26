<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', "HomeController@index");*/

Route::get('/', function () {
	return view('index'); 
})->middleware('test');

Route::get('add-contact','ContactController@AddContact');
Route::get('all-contact','ContactController@AllContact')->name('all.contact');
Route::post('insert-contact','ContactController@InsertContact');
Route::get('delete-contact/{id}','ContactController@DeleteContact');
Route::get('view-contact/{id}','ContactController@ViewContact');
Route::get('edit-contact/{id}','ContactController@EditContact');
Route::post('update-contact','ContactController@UpdateContact');

/*Route::get('/about/{id}/{name}', function ($id,$name) {
	return "User $id and user name $name";
})->where(['id'=>'[0-9]+', 'name'=>'[A-Za-z]+']);;
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
