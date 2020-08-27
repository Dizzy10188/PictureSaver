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
        <h1><a style="font-size: 60px;" class="text-light" href="/">Insert an Image</a></h1>
    </div>
</header>

<body>
    <br /><br />
    <div class="container" style="width: 500px;">
        <br />
        <form action="/userImages" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="file" name="image" id="image" />
            <br />
            <input style="font-size: 30px;" class="form-control" type="submit" name="insert" id="insert" value="Insert" />
        </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#insert').click(function() {
            var image_name = $('#image').val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            } else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if (extension != 'gif' && extension != 'png' && extension != 'jpg' && extension != 'jpeg') {
                    alert("Invalid imagen");
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>