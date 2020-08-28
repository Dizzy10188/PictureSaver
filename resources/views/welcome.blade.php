<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

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
                <h3 class="btn"><a class="directory" href="upload">Upload</a></h3>
                <h3 class="btn"><a class="directory" href="userImages">Images</a></h3>
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
    <div class="search">
        <form action="/search" method="POST">
            @csrf
            <input type="text" name="username" required placeholder="Search for User">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <br /><br />
    <div style="width: 80%;">
        <h1 style="text-align: center;">Images</h1>
        <div class="results-container">
            <br />
            <br />
            <?php
            $query2 = "SELECT * FROM images ORDER BY id DESC";
            $result = mysqli_query(ConnGet(), $query2);
            while ($row = mysqli_fetch_array($result)) {
                echo '
                        <div class="image-container">
                            <img class="image-results" src="data:image/jpeg;base64, ' . base64_encode($row['name']) . '"/>
                        </div>';
            }
            ?>
        </div>
</body>
<style>
    .search {
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
        padding: 0px 20px;
        height: 40px;
    }

    #search-submit {
        height: 40px;
        margin: 0px 5px;
    }

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