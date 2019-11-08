<?php

/**
 * Show Todo Dashboard
 */

Route::get('/', 'TodoController@index');

/**
 *  Show create todo form
 */
Route::get('/todos/create', 'TodoController@create');

/**
 * Add Todo
 */
Route::post('/todos', 'TodoController@store');

/**
 * Show edit todo
 */
Route::get('todos/{todo}/edit', 'TodoController@edit');

/**
 * update todo
 */
Route::put('todos/{todo}', 'TodoController@update');

/**
 * Delete Todo
 */
Route::get('/todos/{todo}/delete', 'TodoController@delete');

/**
 * Edit List Todo
 */
Route::get('/todos/{todo}/list/', 'TodoController@list');

/**
 * Add List Todo
 */
Route::get('/todos/add/', 'TodoController@add');

/**
 * Show List Todo
 */
Route::get('/todos/show/', 'TodoController@show_lists');
