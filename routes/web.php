<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@home') ; //main route
Route::resource('tasks', 'TaskController'); //a resources route which assigned to typical 'CRUD' controller (TasksController)
                                            //which predefined with loads of functions