<?php
Route::get('/', 'HomeController@home');
Route::get('todos', 'TodoController@index');
Route::post('todos', 'TodoController@store');
Route::get('todo/{id}/delete', 'TodoController@destroy');
