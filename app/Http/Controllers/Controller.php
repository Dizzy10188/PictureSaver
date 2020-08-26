<?php

namespace App\Http\Controllers;

include_once "../database/DBConnector.php";

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //
    function index(Request $request)
    {
        
        $output = $request->session()->get('Data');

        $name = $output['uname'];
        $pass = $output['psw'];

        $query = "SELECT user_id FROM users WHERE username='$name' AND password='$pass'";
        
        $result = mysqli_query(ConnGet(), $query);
        
        if (!$result) {
            $message  = 'Invalid query:' . mysqli_connect_error();
            $message .= ' Whole query: ' . $query;
            $message .= ' username: ' . $name;
            $message .= ' password: ' . $pass;
            die($message);
        }
        
        while ($row = $result->fetch_assoc()) {
            $userID = $row['user_id']; 
            // echo $row['user_id'];    
        }
        // print_r($userID);
        $output['userID'] = $userID;

        print_r($output);
        // print_r($output['userID']);
        // print_r($output['uname']);
        // print_r($output['psw']);
        return view('welcome');
    }
}
