@extends('layouts.app')
@section('content')
<section style="padding-top:70px;">
    <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-title ">
                    <h2 style="text-transform:uppercase; text-align:center;"> Anime List</h2>
                </div>
                <hr>
                <div class="card-body">
                    @if(Session::has('post_created'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('post_created')}}
                    </div>
                    @endif
                    <form method="POST" action="{{route('post.create')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="card-subtitle">Anime Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Post Title" value="{{ old('title') }}" />
                            <span style="color:red;">@error('title'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="body" class="card-subtitle">Anime Description</label>
                            <textarea name="body" class="form-control" rows="3" placeholder="Enter Post Description">{{ old('body') }}</textarea>
                            <span style="color:red;">@error('body'){{$message}}@enderror</span>
                        </div>
                        <div class="card-link">
                            <hr>
                            <button type="submit" class="btn btn-success">Add Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection