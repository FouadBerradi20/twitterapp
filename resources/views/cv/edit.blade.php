@extends('layouts.app')


@section('content')
<!--
@if(count($errors))
<div class="alert alert-danger" role="alert">
<ul>
	@foreach($errors->all() as $message)
<li>{{$message}}</li>
@endforeach
</ul>
</div>
@endif -->
<!--.container>.row>.col-md-12		-->
<div class="container"> 
	<div class="row">
		<div class="col-md-12">


			<form action="{{url('cvs/'.$cv->id)}}" method="post" enctype="multipart/form-data"> 
				    <input type="hidden" name="_method" value="PUT">


	{{csrf_field()}}
<div class="form-group @if($errors->get('titre')) has-error @endif"> 
	<label for="">Titre</label>
	 <input type="text" name="titre" class="form-control" value="{{$cv->titre}} ">
	 @if($errors->get('titre'))
	 @foreach($errors->get('titre') as $message)
	 <li>{{$message}}</li>
	 @endforeach
	 @endif
	</div>
	<div class="form-group @if($errors->get('presentation')) has-error @endif"> 
	<label for="">Presentation</label>
	<textarea type="text" name="presentation"  class="form-control">{{$cv->presentation}} </textarea>
	@if(count($errors->get('presentation')))
	 @foreach($errors->get('presentation') as $message)
	 <li>{{$message}}</li>
	 @endforeach
	 @endif
</div>
<div class="form-group">
<label for="">image</label>
<input class="form-control" type="file" name="pho">

</div>
	<div class="form-group"> 
	
	 <input type="submit" value="Modifier" class="form-control btn btn-danger">
	</div>

			</form>



		</div>


	</div>
		</div>



@endsection