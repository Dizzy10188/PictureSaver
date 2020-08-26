<?php

// Path: \MyLaravel\routes

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

// !!! Routng is order specific !!!

// Controller: in App/http/controllers
Route::get('control/{value}', 'myController@page');


// -----------------------------------
// Default route: Look for view-page welcome.blade.php in path "/resources/views"
Route::get('/', function () {
    return view('welcome');
});

//Setting the route to POST the uploaded image from the upload page
Route::post('/', function () {
    return view('welcome');
});

//Setting the controller for login to the route
Route::post('/', "Controller@login");

//Setting the controller for login to the route
Route::post('/', "Controller@register");

//Setting the route to GET to the upload page
Route::get('/upload', function () {
    return view('upload');
});

//Setting the route to GET to the login page
Route::get('/login', function () {
    return view('login');
});

//Setting the route to GET to the register page
Route::get('/register', function () {
    return view('register');
});