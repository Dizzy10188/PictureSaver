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

// Return text
Route::get('welcome', function () {
    return 'Helo World';
});

// Look for view-page blaw.blade.php in path "/resources/views"
Route::get('blaw', function () {
    return view('blaw');
});

// ----------------------------------
// Pass in variable
Route::get('param', function () {
	$value = request('value');
    return view('param', ['value' => $value]); // Variable '$value' will be visible to 'param'
});

// Windcard value
Route::get('wild/{wildvalue}', function ($value) {
    return view('wildcardvalue', ['value' => $value]); // Variable '$value' will be visible to 'wild'
});

// -----------------------------------
// Controller: in App/http/controllers
Route::get('control/{value}', 'myController@page');


// -----------------------------------
// Default route: Look for view-page welcome.blade.php in path "/resources/views"
Route::get('/', function () {
    return view('welcome');
});

