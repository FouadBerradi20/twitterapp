@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-----Search section---->
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="card-custom">
                <h2>Search </h2>
                <form method="get" action="{{ route('searchprofil') }}" class="navbar-search">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label></label>
                        <input type="search" class="form-control" placeholder="Your Keyword" name="searchprofil">
                    </div>
             
                    <div class="card-custom-footer">
                        <button class="btn btn-primary btn-fill btn-round">Search</button>
                    </div>


                </form>
            </div>

        </div>
    </div>


    <section id="cards">

        <h3 class="text-center">PROFILES</h3>
        <form action="{{url('profiles')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 add">
                    <button id="modalBtn" class="btn btn-primary"><i class="fa fa-plus"></i>Add To Group</button>
                </div>
            </div>


            

            <div class="row">
               

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


                                  <!--
                                        <form action="{{url('followprofile')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}  
            <input type="hidden" name="sc" value="{{ $value['screen_name'] }}">

<button type="sumbit" value="followprofile"> Follow</button>

        </form>
    -->
    <!--
        <a href="{{url('followprofile')}}" class="btn btn-simple">faire folow 
                                                       <input type="hidden" name="sc" value="{{ $value['screen_name'] }}"> </a>


                                    
-->

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
            </div>

            <!---AJOUTER un groupe html---->
           


             <div id="simpleModal" class="modal">
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
                </div>
        </form>

    </section>


</div>






@endsection


