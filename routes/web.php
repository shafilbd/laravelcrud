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

Route::get('/', 'ContactController@index')->name('all.post');
/*Route::get('/','CrudController@create');*/
Route::post('/add','ContactController@store');


Route::get('/student', 'AjaxCrudController@index');

Route::post('/studentadd', 'AjaxCrudController@store');
Route::put('/studentupdate/{id}', 'AjaxCrudController@update');
Route::post('/studentdelete/{id}', 'AjaxCrudController@destroy');


Route::resource('contact','ContactController');
Route::resource('ajax','CrudController');
Route::resource('crud','AjaxCrudController');

Route::get('crud/contact', 'AjaxCrudController@index');

Route::get('admin/contacts', 'UserController@getIndex');
Route::get('admin/contacts/data', 'UserController@getData');
Route::post('admin/contacts/store', 'UserController@postStore');
Route::post('admin/contacts/update', 'UserController@postUpdate');
Route::post('admin/contacts/delete', 'UserController@postDelete');


/*Route::get('ajax/destroy/{id}', 'CrudController@destroy');*/
Route::get('/delete/{id}', 'ContactController@destroy');




/*i just wanna read data*/

