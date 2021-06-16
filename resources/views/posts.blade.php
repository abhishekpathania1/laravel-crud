<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ANIME HUB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/posts">LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/add-post">Add New Anime</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section style="padding-top: 70px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-text">
                        @if(Session::has('post_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('post_deleted')}}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Anime Title</th>
                                    <th>Anime Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td><?php $i = 0 ?>
                                        @foreach($posts as $post)
                                        <?php $i++ ?>
                                       
                                <tr>
                                    <td>{{$i}}</td>
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>
                                        <a href="/posts/{{$post->id}}" class="btn btn-info">Details</a>
                                        <a href="/edit-post/{{$post->id}}" class="btn btn-warning">UPDATE</a>
                                        <a href="/delete-post/{{$post->id}}" class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>


                        </table>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 offset-5">
                                    <span>{{$posts->links()}}</span>
                                    <style>
                                        .w-5 {
                                            display: none;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </section>


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>