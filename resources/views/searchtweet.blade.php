@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <!---Search section-->
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="card-custom">
                <h2>Search </h2>
                <form method="get" action="{{ route('searchtweet') }}" class="navbar-search">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label></label>
                        <input type="search" class="form-control" placeholder="Your Keyword" name="searchtweet">
                    </div>
                    <div class="card-custom-footer">
                        <button class="btn btn-primary btn-fill btn-round">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---Card section-->
    <section id="cards">
        <h3 class="text-center">Tweets</h3>
        <div class="row">
            <div class="col-md-12 add">
                <button id="modalBtn" class="btn btn-primary" data-target="simpleModal" data-toggle="modal"><i class="fa fa-plus"></i>Add To Group</button>
            </div>
        </div>
      
        <!--- cards container-->
        <div class="row">
            <!---for each here -->
            @if(!empty($data))
            @foreach($data as $key => $value)
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('assets/img/faces/couverture3.jpg') }}" alt=""/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-gray" src="{{ asset('assets/img/faces/tweet3.png') }}" alt=""/>
                            <h4 class="title">{{str_limit( $value['text'],50) }} <input type="hidden" name="text[]" value="{{ $value['text'] }}"> <br />
                            <small>{{ $value['user']['screen_name'] }} <input type="hidden" name="screen_name[]" value="{{ $value['user']['screen_name'] }}"> </small>
                            <small>{{ $value['id'] }} <input type="hidden" name="id[]" value="{{ $value['id'] }}"> </small>
                            </h4>
                        </div>
                        <p class="description text-center"> {{str_limit($value['retweet_count'],50)  }}
                            <input type="hidden" name="retweet_count[]" value="{{ $value['retweet_count'] }}">
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                      <!--   <div class="mx-4">
                            <button
                            class="btn btn-primary btn-round"
                            data-toggle="modal"
                            data-target="#tweet"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-danger">eet</button>
                            <button class="btn btn-simple">tw</button>
                            <button class="btn btn-primary">me</button>
                        </div> -->
                        <a href="https://twitter.com/{{ $value['user']['screen_name'] }}/status/{{ $value['id'] }}" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="{{$key}}" name='groupe[]' checked >
                                <span class="form-check-sign"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
</div>
<!---AJOUTER un groupe html-->
<div id="simpleModal" class="modal">
    <form action="{{url('tweets')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <span class="closeBtn">&times;</span>
                <h2>Add To Group</h2>
            </div>
            <div class="modal-body">
                
                <div class="row add-croup">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Groups</label>
                            <select name="groupes" class="form-control" >
                                <option hidden >Veuillez choisir un groupe</option>
                                @if(!empty($data))
                                @foreach($datas as $key => $data)
                                <option value="{{ $key }} "> {{ $data}} </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-fill ">Add</button>
            </div>
        </div>
    </form>
</div>
<!---retweet-->
<div id="retweet" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="closeBtn">&times;</span>
            <h2>Add To Group</h2>
        </div>
        <div class="modal-body">
            <div class="row add-croup">
                <div class="col-md-12">
                    <div class="form-group">
                        retweet
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary btn-fill ">Add</button>
        </div>
    </div>
</div>


@endsection