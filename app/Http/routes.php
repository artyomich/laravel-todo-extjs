<?php
Route::get('/', 'HomeController@home');
Route::get('sampleapp', 'AppController@app');
Route::get('todos', 'TodoController@index');
Route::post('todos', 'TodoController@store');
Route::post('todo', 'TodoController@store');
Route::get('todo/{id}/update', 'TodoController@update');
Route::get('todo/{id}/delete', 'TodoController@destroy');
