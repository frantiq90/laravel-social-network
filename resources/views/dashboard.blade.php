@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you want to say?</h3></header>
            <form action="{{ route('createpost') }}" method="post">
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Say something..."></textarea>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say ...</h3></header>
            @foreach($posts as $post)
                <article class="post">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted By {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="interactions">
                        <a href="#">Like |</a>
                        <a href="#">Dislike</a>
                        @if (Auth::user() == $post->user)
                            |
                            <a href="#">Edit |</a>
                            <a href="{{ route('deletepost', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection