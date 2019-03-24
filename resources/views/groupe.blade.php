@extends('layouts.master')
@section('content')






<center> <h1> My Groups</h1> </center>
    <form method="" action="">
        <div class="row">
            <div class="col-md-12 add">
                <button id="modalBtn" class="btn btn-primary"><i class="fa fa-plus"></i>Add Group</button>
            </div>
        </div>


        <!---Groupe container--->
        <div class="row">
            {{ csrf_field() }}


            @if(!empty($data))

                @foreach($data as $key => $value)

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/faces/twitterbackground.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="assets/img/faces/twitter.png" alt="..."/>

                                        <h4 class="title">{{ $value['titre'] }}<br />

                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> {{ $value['description'] }}
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ url('profilpar/'.$value->id.'/groupe')}}"  class="btn btn-simple"><i class="fa fa-users"></i> </a>
                                <a href="{{ url('tweetpar/'.$value->id.'/groupe')}}" class="btn btn-simple"><i class="fa fa-mail-forward"></i></a>
                            </div>
                        </div>
                    </div>


                @endforeach
            @endif
        </div>


    </form>

    <!--- ajouter groupe modal--->
    <div id="simpleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="closeBtn">&times;</span>
            <h2>Add Group</h2>
        </div>
        <div class="modal-body">
            <div class="row add-croup">
                <div class="col-md-12">
                    <div class="form-group">
                        <form action="{{url('groupes')}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <div class="form-group @if($errors->get('titre')) has-error @endif">
                                <label for="">Title</label>
                                <input type="text" name="titre" class="form-control" value="{{old('titre')}}">
                                @if($errors->get('titre'))
                                    @foreach($errors->get('titre') as $message)
                                        <li>{{$message}}</li>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group @if($errors->get('presentation')) has-error @endif">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                                @if(count($errors->get('description')))
                                    @foreach($errors->get('description') as $message)
                                        <li>{{$message}}</li>
                                    @endforeach
                                @endif
                            </div>


                            <div class="form-group">

                                <input type="submit" value="Add" class="form-control btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="modal-footer">
            <button class="btn btn-primary btn-fill ">Add</button>
        </div> -->
    </div>
</div>


@endsection