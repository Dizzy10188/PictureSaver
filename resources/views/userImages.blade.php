<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>

<?php
include_once "../database/DBConnector.php";
$ConnDB = ConnGet();
$data = session('user');
if (isset($_POST["insert"])) {
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $sql = "INSERT INTO images(user_id, name) VALUES ('$data', '$file')";

    if (mysqli_query($ConnDB, $sql)) {
        echo '<script>alert("Image Upload and add it to database succesfully")</script>';
    }
}
$query = "SELECT username FROM users WHERE user_id = '$data'";
$result = mysqli_query($ConnDB, $query);
while ($row = mysqli_fetch_array($result)) {
    $username = $row['username'];
}
?>

<header class="header">
    <div class="row">
        <div>
            <h1 class="btn"><a class="directory" href="/">Home</a></h1>
            <h3 class="btn"><a class="directory" href="upload">Upload</a></h3>
        </div>
    </div>
</header>

<body>
    <br /><br />
    <div style="width: 80%;">
        <br />
        <br />
        <h1 style="text-align: center;">Your Images</h1>
        <div class="results-container">
            <?php
            $query = "SELECT * FROM images WHERE user_id = '$data' ORDER BY id DESC";
            $result = mysqli_query($ConnDB, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '
                        <div class="image-container">
                            <img class="image-results" src="data:image/jpeg;base64, ' . base64_encode($row['name']) . '"/>
                        </div>';
            }
            ?>
        </div>
    </div>
</body>
<style>
    .image-results {
        width: 400px;
        height: auto;
    }

    .results-title {
        width: 50%;
        margin: auto;
        text-align: center;
    }

    .results-container {
        width: 90%;
        margin: auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .image-container {
        padding: 10px;
        background-color: #ddd;
        width: min-content;
        margin: 10px 0px;
    }
</style>

</html>