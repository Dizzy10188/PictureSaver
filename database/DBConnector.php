<?php

//Defining Database connection variables
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'pictureDB');

//Creating and returning a connection to mySQL
function ConnGet() {
    $ConnDB = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3308)

    //If it can't connect to the database, it sends out this error
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error());

    return $ConnDB;
}
?>