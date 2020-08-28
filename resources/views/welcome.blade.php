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
$data = session('user');
?>

<header class="header">
    <!-- <div class="header">
        <h1 >Picture Saver</h1>
        <p style="font-size: 20px;">By Wesley Monk</p>
    </div> -->
    
    @if(isset($data))
    <div class="container">
        <div class="row">
            <div>
                <h3 class="btn"><a class="directory" href="logout">Logout</a></h3>
                <!-- <p style="font-size: 20px;">Click the link above to go to the login page</p> -->
                <h3 class="btn"><a class="directory" href="upload">Upload</a></h3>
                <!-- <p style="font-size: 20px;">Click the link above to go to another page to upload a image of your choosing</p> -->
            </div>
            <div class="col-sm-4">
                <h3 style="font-size: 40px;"><a class="bg-secondary text-light" style="margin-bottom: 8px; padding: 8px; border-radius: 25px;" href="userImages">Your Images</a></h3>
                <p style="font-size: 20px;">Click the link above to go see all the pictures you have uploaded</p>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div>
                <h3 class="btn"><a class="directory" href="register">Register</a></h3>
                <!-- <p style="font-size: 20px;">Click the link above to go to to the register page</p> -->
                <h3 class="btn"><a class="directory" href="login">Login</a></h3>
                <!-- <p style="font-size: 20px;">Click the link above to go to the login page</p> -->
            </div>
        </div>
    </div>
    @endif
</header>

<body>
    <h2 id="userID">UserID: {{$data ?? ''}}</h2>
    <br /><br />
    <div style="width: 80%;">
        <br />
        <br />
        <table class="table table-bordered">
            <tr>
                <th id="thImg">Images</th>
            </tr>
            <?php
            $query2 = "SELECT * FROM images ORDER BY id DESC";
            $result = mysqli_query(ConnGet(), $query2);
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
<style>
    .search{
        width: min-content;
        margin: 25px auto;
        text-align: center;
    }
    .search>form {
        display: flex;
        flex-direction: row;
    }
    #username-search-input {
        text-align: baseline;
        padding: 0px 10px;
        height: 40px;
    }
    #search-submit{
        height: 40px;
        margin: 0px 5px;
    }
</style>
</html>