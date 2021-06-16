@extends('layouts.app')
@section('content')
<section style="padding-top:70px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-title">
                        <h2 style="text-align:center;"><strong >ANIME DETAILS</strong></h2>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="card-subtitle">Anime Title</label>
                            <input type="text" value="{{$post->title}}" class="form-control" disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="title" class="card-subtitle">Anime Description</label>
                            <input type="text" value="{{$post->body}}" class="form-control" disabled></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection