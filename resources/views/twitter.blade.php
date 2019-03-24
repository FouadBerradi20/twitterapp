@extends('layouts.master')
@section('content')
<div class="container">
    <h2>Laravel 5 - Twitter API search tweets with keywords</h2>
    <form method="get" action="{{ route('search') }}" class="navbar-search pull-left">
        {{ csrf_field() }}
        <input name="query" type="search" class="search-query" placeholder="Rechercher">
    </form>
    <form method="POST" action="{{ url('tweets') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if(count($errors))
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br/>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label>Add Tweet Text:</label>
            <textarea class="form-control" name="tweet"></textarea>
        </div>
        <div class="form-group">
            <label>Add Multiple Images:</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Add New Tweet</button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Twitter Id</th>
                        <th>Text Tweet</th>
                        <th>screen name</th>
                        <th>Retweet</th>
                        <th>Affecter</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data))
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value['id'] }} <input type="hidden" name="id[]" value="{{ $value['id'] }}"> </td>
                        <td>{{ $value['text'] }} <input type="hidden" name="text[]" value="{{ $value['text'] }}"> </td>
                        <td>{{ $value['user']['screen_name'] }} <input type="hidden" name="screen_name[]" value="{{ $value['user']['screen_name'] }}"> </td>
                        <td>{{ $value['retweet_count'] }} <input type="hidden" name="retweet_count[]" value="{{ $value['retweet_count'] }}"> </td>
                        <td><input type='checkbox' name='groupe[]' value="{{$key}}" ></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">There are no data.</td>
                    </tr>
                    @endif
                </tbody>
            </div>
            <div class="form-group">
                
            </form>
            @if(!empty($data))
            @foreach($data as $key => $value)
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>
                                <h4 class="title">{{ $value['text'] }}<br />
                                <small>{{ $value['user']['screen_name'] }}</small>
                                </h4>
                            </a>
                        </div>
                        <p class="description text-center"> {{ $value['retweet_count'] }}
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @endsection