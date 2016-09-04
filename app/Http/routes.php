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
Route::get('/',function(){
   return view('welcome');
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
use Illuminate\Http\Request;


Route::group(['middleware' => ['web']], function () {
   Route::get('form','Student@getForm');
   Route::post('insert','Student@store');
   Route::get('view','Student@viewData');
   Route::get('editform/{id}','Student@editData');
   Route::post('update/{id}','Student@updateData');
   Route::get('delete/{id}','Student@deleteData');

   Route::get('form1', 'Header@getForm');
   Route::post('post', 'Header@store');
   Route::get('show', 'Header@display');
   Route::get('editform/{id}', 'Header@editData');
   Route::post('update/{id}', 'Header@updateData');
   Route::get('delete/{id}','Header@deleteData');
});
