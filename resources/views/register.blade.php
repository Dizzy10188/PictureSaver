<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/style.css') }}">
    <title>Picture Saver</title>
</head>

<?php
include_once "../database/DBConnector.php";
$ConnDB = ConnGet();
if (isset($_POST["uname"]) && isset($_POST["psw"])) {
    $query = "INSERT INTO users(username, password) VALUES ('$_POST[uname]', '$_POST[psw]')";

    if (mysqli_query($ConnDB, $query)) {
        echo '<script>alert("Account created")</script>';
    } else {
        echo '<script>alert("Username has been taken")</script>';
    }
}

?>

<!-- header #1 -->
<header class="header">
    <div class="container">
        <h1 class="btn"><a class="directory" href="/">Home</a></h1>
    </div>
</header>

<body>
    <br><br><br><br>
    <div class="container">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" name="uname" required>
            </div>
            <div class="form-group">
                <label for="psw">Password:</label>
                <input type="password" class="form-control" id="psw" name="psw" required>
            </div>
            <button type="submit" id="register" name="register" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>