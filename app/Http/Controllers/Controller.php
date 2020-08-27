<?php

namespace App\Http\Controllers;

include_once "../database/DBConnector.php";

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request as Req;
use App\User;

use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //
    function login(Request $request)
    {

        // Getting the form data from the login
        $user = Req::get('uname');
        $pass = Req::get('psw');

        // Querying the Database to find a user that matches the form data
        $res = User::where([['username', '=', $user],['password', '=', $pass]])->get('user_id')->first();

        // Checking for if the response has a user_id
        if(isset($res->user_id)){
            // Setting a session for the user
            session(['user' => $user]);
            // Giving an alert to the user that they have logged in
            echo "<script>alert('Logged In')</script>";
            return redirect('/');//view('welcome')->with('data',  $_SESSION['user']);
        }
        else {
            // Alerting the user that the login was unsuccessful
            echo "<script>alert('Username or Password is Incorrect')</script>";
            return view('login');
        }
        // $output = $request->session()->get('Data');

        // $name = $output['uname'];
        // $pass = $output['psw'];

        // $query = "SELECT user_id FROM users WHERE username='$name' AND password='$pass'";

        // $result = mysqli_query(ConnGet(), $query);

        // if (!$result) {
        //     $message  = 'Invalid query:' . mysqli_connect_error();
        //     $message .= ' Whole query: ' . $query;
        //     $message .= ' username: ' . $name;
        //     $message .= ' password: ' . $pass;
        //     die($message);
        // }

        // while ($row = $result->fetch_assoc()) {
        //     $userID = $row['user_id'];
        //     // echo $row['user_id'];    
        // }
        // // print_r($userID);
        // $output['userID'] = $userID;

        // // print_r($output);
        // // print_r($output['userID']);
        // // print_r($output['uname']);
        // // print_r($output['psw']);
        // $request->session()->put('userID', $output['userID']);
        // return view('welcome')->with('data', $request->session()->get('userID'));
    }
}
