<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<?php
    include_once "../database/DBConnector.php";
    $ConnDB = ConnGet();
    if (isset($_POST["insert"])) {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $sql = "INSERT INTO images(name) VALUES ('$file')";

        if (mysqli_query($ConnDB, $sql)) {
            echo '<script>alert("Image Upload and add it to database succesfully")</script>';
        }
    }
?>

<header class="header" id="header1">
    <div class="jumbotron text-center bg-secondary">
        <h1><a style="font-size: 60px;" class="text-light" href="/">"$username" Images</a></h1>
    </div>

    <div class="col-sm-4">
                <h3 style="font-size: 40px;"><a class="bg-secondary text-light" style="margin: 600px; margin-bottom: 8px; padding: 8px; border-radius: 25px;" href="upload">Upload</a></h3>
            </div>
</header>

<body>
<br /><br />
    <div class="container" style="width: 50%;">
        <br />
        <br />
        <table class="table table-bordered">
            <!-- <tr>
                <th style="font-size: 30px;"></th>
            </tr> -->
            <?php
                $query = "SELECT * FROM images ORDER BY id DESC";
                $result = mysqli_query($ConnDB, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                        <tr>
                            <td>
                                <img src="data:image/jpeg;base64, ' . base64_encode($row['name']) . '" style="height=30%"/>
                            </td> <th>
                        </tr>';
                }
            ?>
        </table>
    </div>
</body>
</html>