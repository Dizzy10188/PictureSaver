<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Picture Saver</title>
</head>

<?php
include_once "../database/DBConnector.php";
$ConnDB = ConnGet();
if (isset($_POST["uname"]) && isset($_POST["psw"])) {
    $name = $_POST["uname"];
    $pass = $_POST["psw"];
    $query = "SELECT user_id, username, password FROM users WHERE username='$name' AND password='$pass'";
    $result = mysqli_query(ConnGet(), $query);

    if (!$result) {
        $message  = 'Invalid query:' . mysqli_connect_error();
        $message .= ' Whole query: ' . $query;
        $message .= ' username: ' . $name;
        $message .= ' password: ' . $pass;
        die($message);
    }

    while ($row = $result->fetch_assoc()) {
        echo '<script>alert("Logged in")</script>';
        $_POST["userID"] = $row['user_id'];
        $_SESSION['user'] = $row['user_id'];
    }
}
?>

<!-- header #1 -->
<header class="header" id="header1">
    <div class="jumbotron text-center bg-secondary">
        <h1><a style="font-size: 60px;" class="text-light" href="/">Home</a></h1>
    </div>
</header>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" name="uname" required>
            </div>
            <div class="form-group">
                <label for="psw">Password:</label>
                <input type="password" class="form-control" id="psw" name="psw" required>
            </div>
            <button type="submit" id="login" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>