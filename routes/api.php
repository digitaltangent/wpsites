<?php

// api.php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/client/create', 'ClientController@store');
Route::get('/client/edit/{id}', 'ClientController@edit');
Route::post('/client/update/{id}', 'ClientController@update');
Route::delete('/client/delete/{id}', 'ClientController@delete');
Route::get('/clients', 'ClientController@index');

Route::post('/task/createtask', 'TaskController@store');
Route::get('/task/edittask/{id}', 'TaskController@edit');
Route::post('/task/updatetask/{id}', 'TaskController@update');
Route::delete('/task/deletetask/{id}', 'TaskController@delete');
Route::get('/tasks', 'TaskController@index');
