@extends('layouts.master')
@section('content')

    <form method="Post" action="{{url('sendmessage')}}">
        <div class="row">
            <div class="col-md-12 add">
                <button id="modalBtn" class="btn btn-primary btn-round "><i class="fa fa-plus"></i>Create A New Message</button>
            </div>
        </div>



        {{ csrf_field() }}


        <div class="row">
            @if(!empty($data))

                @foreach($data as $key => $value)

            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('assets/img/faces/couverture3.jpg') }}" alt=""/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <a href="">

                                <img class="avatar border-gray" src=" {{ asset('assets/img/faces/profile.png') }}" alt=""/>

                                <h4 class="title">{{ $value['name'] }} <input type="hidden" name="name[]" value="{{ $value['name'] }}"><br />
                                    <small>{{ $value['idprofil'] }} <input type="hidden" name="idprofil[]" value="{{ $value['idprofil'] }}"></small>
                                </h4>
                            </a>
                        </div>
                        <p class="description text-center"> {{ $value['description'] }} <input type="hidden" name="description[]" value="{{ $value['description'] }}">
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa  fa-hand-o-right "></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>


                        <div class="form-check">
                            <label class="form-check-label">
                                <input  checked type='checkbox' name='Profil[]' value="{{$value['idprofil']}}  " >

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
                    <h5>Create A New Message</h5>
                </div>
                <div class="modal-body">
                    <div class="row add-croup">
                        <div class="col-md-12">
                            <div class="form-group">


                                <label>Message</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                                <button type="submit" class="btn btn-primary btn-lg btn-block"> <i class="fa fa-send"></i>   Send Your Message</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="modal-footer">
                    <button class="btn btn-primary btn-fill "><i class="fa fa-send"></i>   send</button>
                </div>
                -->

            </div>
        </div>

    </form>







@endsection