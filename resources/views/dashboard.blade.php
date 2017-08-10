@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you want to say?</h3></header>
            <form action="#">
                <div class="form-group">
                    <textarea name="new-post" id="new-post" cols="30" rows="5" class="form-control" placeholder="Say something..."></textarea>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say ...</h3></header>
            <article class="post">
                <p>Lorem ipsum lorem ipsum ipsum lorem ipsumipsum lorem ipsumipsum lorem ipsumipsum lorem ipsum
                    ipsum lorem ipsumipsum lorem ipsum</p>
                <div class="info">
                    Posted By Master on 7-08-2017
                </div>
                <div class="interactions">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum lorem ipsum ipsum lorem ipsumipsum lorem ipsumipsum lorem ipsumipsum lorem ipsum
                    ipsum lorem ipsumipsum lorem ipsum</p>
                <div class="info">
                    Posted By Master on 7-08-2017
                </div>
                <div class="interactions">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>

        </div>
    </section>
@endsection