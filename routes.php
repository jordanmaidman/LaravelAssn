<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::resource('dogs','dogcontroller');

//get all records
Route::get('dogs', 'dogcontroller@index');
//show specific dog
Route::get('dogs/{id}', 'dogcontroller@edit');
//delete a dog
Route::get('dogs/{id}/delete', 'dogcontroller@destroy');
//create
Route::post('dogs/store', 'dogcontroller@store');
//Tryupdate
Route::post('dogs/{id}/edit', 'dogcontroller@updateDog');
//update
//Route::post('dogs/{id}/update', 'dogcontroller@update');
//Correct a value
//Route::post('dogs/{id}/edit', 'dogcontroller@correct');


//Route::post('dogs/store', 'dogcontroller@store');
//Route::delete('dogs/delete', 'dogcontroller@destroy');
//Route::delete('/dogs/{id)',dogcontroller@destroy');
//Route:get('see','DogController@index');;
//Route::get ('/seedog','dogcontroller@readdog');
//Route::post ('/addDog', 'dogcontroller@adddog');
//Route::post ('/editDog', 'dogcontroller@editdog');
//Route::post ('/deleteDog', 'dogcontroller@deletedog');

Route::get('/', function () {
    return view('index');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
