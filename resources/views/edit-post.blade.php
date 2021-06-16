@extends('layouts.app')

@section('content')
  <section style="padding-top:70px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-title">
            <h2  style="text-align: center;"><strong>EDIT ANIME</strong></h2> 
          </div><hr>
          <div class="card-body">
            @if(Session::has('post_updated'))
            <div class="alert alert-success" role="alert">
              {{Session::get('post_updated')}}
            </div>
            @endif
            <form method="POST" action="{{route('post.update',$post->id)}}">
              @csrf

              <div class="form-group">
                <label for="title">Anime Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}{{$post->title}}" />
                <span style="color:red;">@error('title'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="body">Anime Description</label>
                <textarea name="body" class="form-control" rows="3">{{ old('body') }}{{$post->body}}</textarea>
                <span style="color:red;">@error('body'){{$message}}@enderror</span>
              </div><hr>
              <button type="submit" class="btn btn-warning">Update Post</button>
            </form>
          </div>

        </div>
      </div>
    </div>

  </section>


  @endsection