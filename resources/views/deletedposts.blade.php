@extends('layouts.app')
@section('content')
<section style="padding-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('post_restored'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('post_restored')}}
                </div>
                @endif
                @if(Session::has('post_deleted'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('post_deleted')}}
                </div>
                @endif
                <table class="table table-bordered table-stripped">
                    <tr>
                        <th><strong style="font-size:18px;">S.No.</strong></th>
                        <th><strong style="font-size:18px;">Anime Title</strong></th>
                        <th><strong style="font-size:18px;">Description</strong></th>
                        <th><strong style="font-size:18px;">Date Deleted</strong></th>
                        <th><strong style="font-size:18px;">Action</strong></th>
                    </tr>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td style="text-transform:uppercase" ;>{{ $post->title }}</td>
                        <td style="text-transform:capitalize" ;>{{ $post->body }}</td>
                        <td style="text-transform:capitalize" ;>{{ date_format($post->deleted_at, 'Y M D h:m:s') }}</td>
                        <td>
                            <a href="{{ route('restoreDeletedPosts', $post->id) }}" class="btn btn-success" title="Restore-post">
                            <i class="fa fa-window-restore" aria-hidden="true" title="Restore-post"></i>
                            </a>
                            <a href="{{ route('deletePermanently', $post->id) }}" class="btn btn-danger" title="Permanently delete">
                            <i class="fa fa-trash" aria-hidden="true" title="Permanently delete"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection