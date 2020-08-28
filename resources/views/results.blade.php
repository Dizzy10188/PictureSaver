<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

<!-- header #1 -->
<header class="header" id="header1">
    <div class="container">
        <div class="row">
            <div>
                <h3 class="btn"><a class="directory" href="/">Home</a></h3>
                <h3 class="btn"><a class="directory" href="upload">Upload</a></h3>
                <h3 class="btn"><a class="directory" href="userImages">Images</a></h3>
            </div>
        </div>
</header>
<div>
    @if(isset($pictures))
        <h1 class="results-title">Pictures of User: {{$name}}</h1>
        <div class="results-container">
        @foreach($pictures as $picture)
            <div class="image-container">
                <img src="data:image/jpeg;base64, {{ base64_encode($picture->name)}}" class="image-results" alt="{{$name}}'s Images'"/>
            </div>
        @endforeach
    @else
        <div class="results-title">
            <?php echo $name ?>
            <div class="search">
                <form action="/search" method="POST">
                    @csrf
                    <input type="text" name="username" required placeholder="Search for User">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
        @endif
</div>
</div>
<style>
    .image-results{
        width: 400px;
        height: auto;
    }
    .results-title{
        width: 50%;
        margin: auto;
        text-align: center;
    }
    .results-container{
        width: 90%;
        margin: auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .image-container{
        padding: 10px;
        background-color: #ddd;
        width: min-content;
        margin: 10px 0px;
    }
</style>