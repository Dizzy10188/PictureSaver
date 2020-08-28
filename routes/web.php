<?php

// Path: \MyLaravel\routes

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\User;

// Checking if Session exists:
    // if (Request::session()->has('user_id')) {
    //     echo "We Have users.\r\n";
    //     echo session('user_id');
    // }
    
// Setting a session:
    // session(['users' => '1']);

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

//Setting the controller for login to the route
Route::post('/login', "Controller@login");

// -----------------------------------
// Default route: Look for view-page welcome.blade.php in path "/resources/views"
Route::get('/', function () {
    if(session()->has('user')){
        $session = session('user');
        // echo $session;
    }
    else {
        $session = null;
        // echo $session;
    }
    return view('welcome')->with('data', $session);
});

//Setting the route to POST the uploaded image from the upload page
// Route::post('/', function () {
//     return view('welcome');
// });

Route::get('/userImages', function () {
    if(session()->has('user')){
        $session = session('user');
        // echo $session;
    }
    else {
        $session = null;
        // echo $session;
    }
    return view('userImages')->with('data', $session);
});

Route::post('/userImages', function () {
    return view('userImages');
});

//Setting the route to GET to the upload page
Route::get('/upload', function () {
    return view('upload');
});


Route::post('/search', function () {
    $username = Request::get('username');
    
    if($username == ""){
        return redirect('/');
    }
    $response = User::where('username', $username)->get()->first();
    //echo $response->id;
    if($response){
        $user_id = $response->user_id;
        $name = $response->username;
        // echo $user_id;
        // echo $name;
        $pictures = DB::table('images')->where('user_id', $user_id)->get();
        return view('results')->with('pictures', $pictures)->with('name', $name);
    }
    else {
        $name =  "<h3>Could Not Find User With That Name.</h3>";
        return view('results')->with('name', $name);
    }
});
//Setting the route to GET to the login page
Route::get('/login', function () {
    return view('login');
});

//Setting the route to GET to the register page
Route::get('/register', function () {
    return view('register');
});

//Setting the route to POST to the register page
Route::post('/register', function () {
    return view('register');
});
// Deleting the user session and redirecting to home
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
});
