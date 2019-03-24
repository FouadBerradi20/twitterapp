@extends('layouts.master')
@section('content')



    <h2>Profiles</h2>


<!--
    <form method="get" action="{{ route('searchprofil') }}" class="navbar-search pull-left">
        {{ csrf_field() }}
        <input name="query" type="search" class="search-query" placeholder="Rechercher">
    </form> -->

    <form method="POST" action="{{url('profiles')}}" enctype="multipart/form-data">


        {{ csrf_field() }}


        @if(!empty($data))

            @foreach($data as $key => $value)

                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="assets/img/faces/couverture2.jpg" alt=""/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="{{ str_replace('_normal', '',  $value['profile_image_url_https']) }}" alt="..."/>

                                    <h4 class="title">{{ $value['name'] }} <input type="hidden" name="name[]" value="{{ $value['name'] }}"> <br />

                                        <small>{{ $value['screen_name'] }} <input type="hidden" name="screen_name[]" value="{{ $value['screen_name'] }}"> </small>
                                        <small> {{ $value['id'] }} <input type="hidden" name="id[]" value="{{ $value['id'] }}"> </small>

                                    </h4>
                                </a>
                            </div>
                            <p class="description text-center"> {{ $value['description'] }} <input type="hidden" name="description[]" value="{{ $value['description'] }}">
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">


                            <a href="https://twitter.com/{{ $value['screen_name'] }}" class="btn btn-simple"><i class="fa fa-twitter"></i></a>

                            <a href="{{url('followprofiles')}}" class="btn btn-simple">
                                <input type="hidden" name="screen_name[]" value="{{ $value['screen_name'] }}"><i class="fa fa-facebook-square"></i> </a>

                           
             

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="{{$key}}" name='groupe[]'  checked>
                                    <span class="form-check-sign"></span>

                                </label>
                            </div>




                        </div>
                    </div>
                </div>


            @endforeach
        @endif













        <div class="col-md-6">
            <div class="card stacked-form">
                <div class="card-header ">
                    <h4 class="card-title">Add To Group</h4>
                </div>
                <div class="card-body ">

                        <div class="form-group">
                            <label>Groups</label>
                            <select name="groupes" class="form-control" >
                                <option hidden >Veuillez choisir un groupe</option>
                                @foreach($datas as $key => $data)
                                    <option value="{{ $key }} "> {{ $data}} </option>
                                @endforeach
                            </select>
                        </div>


                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-info">Add</button>
                </div>
            </div>
        </div>



    </form>







@endsection