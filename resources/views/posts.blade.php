@extends('layouts.app')
@section('content')
<section style="padding-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('post_deleted'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('post_deleted')}}
                </div>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><strong style="font-size:18px;">S.NO</strong></th>
                            <th><strong style="font-size:18px;">Anime Title</strong></th>
                            <th><strong style="font-size:18px;">Anime Description</strong></th>
                            <th><strong style="font-size:18px;">Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = $posts->perPage() * ($posts->currentPage() - 1);
                        @endphp  
                        @foreach($posts as $post)
                        <tr>
                            <td style="text-transform:uppercase" ;> {{++$i}}</td>
                            <td style="text-transform:uppercase" ;>{{$post->title}}</td>
                            <td style="text-transform:capitalize" ;>{{$post->body}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true" title="DETAILS"></i></a>
                                <a href="/edit-post/{{$post->id}}" class="btn btn-warning"><i class="fas fa-pen" title="UPDATE"></i></a>
                                <a href="/delete-post/{{$post->id}}" class="btn btn-danger"><i class="fas fa-trash" title="DELETE"></i></a>
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
</section>
@endsection