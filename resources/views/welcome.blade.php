@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $user->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-xs-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1 class="fas fa-child">Welcome to the Microposts</h1>
                <a class="fas fa-list-alt fa-2x">タスクを管理しましょう</a>
                <style>
                    .fa-list-alt{
                        color:#30a39f;
                        padding-right:20px;
                    }
                </style>
               {!! link_to_route('signup.get','Sign up now!', null, ['class' =>'btn btn-lg btn-primary']) !!}
               
               {!! link_to_route('login', 'Login now!',null, ['class' =>'btn btn-lg btn-default']) !!}
            </div>
        </div>
    @endif
@endsection