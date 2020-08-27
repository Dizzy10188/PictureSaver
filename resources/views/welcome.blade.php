<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
if (isset($_POST["insert"])) {
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO images(name) VALUES ('$file')";

    if (mysqli_query($ConnDB, $query)) {
        echo '<script>alert("Image Inserted into Database")</script>';
    }
}

?>

<header class="header" id="header1">
    <div class="jumbotron text-center bg-secondary">
        <h1 style="font-size: 60px;">Picture Saver</h1>
        <p style="font-size: 20px;">By Wesley Monk</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3 style="font-size: 40px;"><a class="bg-secondary text-light" style="margin-bottom: 8px; padding: 8px; border-radius: 25px;" href="register">Register</a></h3>
                <p style="font-size: 20px;">Click the link above to go to to the register page</p>
            </div>
            <div class="col-sm-4">
                <h3 style="font-size: 40px;"><a class="bg-secondary text-light" style="margin-bottom: 8px; padding: 8px; border-radius: 25px;" href="login">Login</a></h3>
                <p style="font-size: 20px;">Click the link above to go to the login page</p>
            </div>
            <div class="col-sm-4">
                <h3 style="font-size: 40px;"><a class="bg-secondary text-light" style="margin-bottom: 8px; padding: 8px; border-radius: 25px;" href="upload">Upload</a></h3>
                <p style="font-size: 20px;">Click the link above to go to another page to upload a image of your choosing</p>
            </div>
        </div>
    </div>
</header>

<body>
    <h2>UserID: {{$data ?? ''}}</h2>
    <br /><br />
    <div class="container" style="width: 80%;">
        <br />
        <br />
        <table class="table table-bordered">
            <tr>
                <th style="font-size: 30px;">Images</th>
            </tr>
            <?php
            $query2 = "SELECT * FROM images ORDER BY id DESC";
            $result = mysqli_query($ConnDB, $query2);
            while ($row = mysqli_fetch_array($result)) {
                echo '
                    <tr>
                        <td>
                            <img src="data:image/jpeg;base64, ' . base64_encode($row['name']) . '" height=30% />
                        </td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>