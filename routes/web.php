<?php

// Path: \MyLaravel\routes

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;
use App\User;

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

//Setting the route to GET to the upload page
Route::get('/upload', function () {
    return view('upload');
});

// Route::post('/upload', function () {
//     $image = Request::get('image');
//     echo '<img src='.$image.' alt="Sabaton"/>';
//     // return view('upload');
// });

Route::post('/search', function () {
    if (Request::session()->has('users')) {
        // echo "We Have users.\r\n";
        // echo session('users');
    }
    session(['users'=> '1' ]);

    // Request::session()
    $username = Request::get('username');
    // echo $username;
    if($username == ""){
        return redirect('/');
    }
    $response = DB::table('users')->where('name', $username)->get()->first();
    //echo $response->id;
    if($response){
        $user_id = $response->id;
        $name = $response->name;
        // echo $user_id;
        // echo $name;
        $pictures = DB::table('images')->where('user_id', $user_id)->get();
        return view('results')->with('pictures', $pictures)->with('name', $name);
    }
    else {
        echo "<h3>Could Not Find User With That Name.</h3>";
    }
});