@extends('layouts.master')

@section('title')
    SANDSbook Dashboard
@endsection

@section('content')

    @include('includes.message-block')
    <section class="row new-post justify-content-center">
        <div class="col-6">
            <header>
                <h3>
                   What do you have to say?
                </h3>
            </header>
            <form action="{{ route('post.create') }}" method="POST">
                <div class="form-group">
                    <textarea name="new-post" class="form-control" id="new-post" cols="30" rows="10" placeholder="your post..."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit"  class="btn btn-warning">Create Post</button>
                    <input name="_token" type="hidden" value="{{ Session::token() }}">
                </div>
            </form>
        </div>
    </section>

    <section class="row posts justify-content-center">
        <div class="col-6">
            <header>
                <h3>What other people say...</h3>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <p>{{ $post->body }}</p>
                        <div class="info">
                            Posted by {{$post->user->first_name}} on {{$post->created_at}}
                        </div>
                        <div class="interaction">
                            <a href="#" class="like"> {{Auth::user()->likes()->where('post_id',$post->id)->first() ?
                            Auth::user()->likes()->where('post_id',$post->id)->first()->like == 1 ?
                            'You Like This post' : 'Like' : 'Like'}} </a> |

                            <a href="#" class="like"> {{Auth::user()->likes()->where('post_id',$post->id)->first() ?
                            Auth::user()->likes()->where('post_id',$post->id)->first()->like == 0 ?
                            'You Don\'t Like This post' : 'Dislike' : 'Dislike'}} </a> |
                            @if(Auth::user() == $post->user)
                                <a href="#" class="edit-a">Edit</a> |
                                <a href="{{route('post.delete', ['post_id' => $post->id] )}}">Delete</a> |
                            @endif

                        </div>
                    </article>
                @endforeach
            </header>
        </div>
    </section>

    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" id="post-body" cols="30" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-save" type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var token = '{{Session::token() }}';
        var urlEdit = '{{route('edit')}}';
        var urlLike = '{{route('like')}}';
    </script>

    <script src="{{URL::to('src/js/app.js')}}"></script>
@endsection

