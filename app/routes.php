<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('register', 'HomeController@register');
Route::get('post-roche', 'HomeController@postRoche');
Route::get('tag-friends', 'HomeController@tagFriends');
Route::post('addUser', array('as' => 'add', 'uses' => 'HomeController@add'));
Route::put('add-post', array('as' => 'addpost', 'uses' => 'HomeController@addPost'));
