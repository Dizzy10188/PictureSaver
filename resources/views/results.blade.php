<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- header #1 -->
<header class="header" id="header1">
    <div class="jumbotron text-center bg-secondary">
        <h1><a style="font-size: 60px;" class="text-light" href="/">Home</a></h1>
    </div>
</header>
<div>
<h1>Pictures of User: {{$name}}</h1>
<div class="results-container">
    @foreach($pictures as $picture)
    <div class="image-container">
        <img src="data:image/jpeg;base64, {{ base64_encode($picture->name)}}" class="image-results" alt="{{$name}}'s Images'"/>
    </div>
    @endforeach
</div>
</div>
<style>
    .image-results{
        height: 400px;
        width: auto;
    }
    .results-container{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    .image-container{
        padding: 10px;
        background-color: #ddd;
        width: min-content;
        margin: 10px;
    }
</style>