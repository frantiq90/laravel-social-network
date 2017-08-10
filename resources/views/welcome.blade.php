@extends('layouts.master')

@section('title')
    Laravel Social Net
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sing Up</h3>
            <form action="{{ route('signup') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input  class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input  class="form-control" type="text" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input  class="form-control" type="Password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>

        <div class="col-md-6">
            <h3>Sing In</h3>
            <form action="{{ route('signin') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input  class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input  class="form-control" type="Password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection