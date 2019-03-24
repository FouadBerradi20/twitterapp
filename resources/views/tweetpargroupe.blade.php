@extends('layouts.master')
@section('content')

    <form method="Post" action="{{url('sendmessagetweets')}}">
        <div class="row">
            <div class="col-md-12 add">
                <button id="modalBtn" class="btn btn-primary btn-round"><i class="fa fa-plus"></i>Create A New Reply</button>
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
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('assets/img/faces/tweet3.png') }}" alt=""/>

                                        <h4 class="title">{{str_limit( $value['text'],50) }} <input type="hidden" name="text[]" value="{{ $value['text'] }}"> <br />
                                            <small>{{ $value['user']['screen_name'] }} <input type="hidden" name="screen_name[]" value="{{ $value['user']['screen_name'] }}"> </small>
                                            <small>{{ $value['id'] }} <input type="hidden" name="id[]" value="{{ $value['id'] }}"> </small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> {{str_limit($value['retweet_count'],50)  }} <input type="hidden" name="retweet_count[]" value="{{ $value['retweet_count'] }}">
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">

                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <td><input  checked type='checkbox' name='Tweet[]' value="{{$value['idtwitter']}}" ></td>
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
                    <h2>Create A Reply</h2>
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