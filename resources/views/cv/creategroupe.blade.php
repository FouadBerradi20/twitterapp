@extends('layouts.master')


@section('content')
<!--.container>.row>.col-md-12		-->
<!--
@if(count($errors))
<div class="alert alert-danger" role="alert">
<ul>
	@foreach($errors->all() as $message)
<li>{{$message}}</li>
@endforeach
</ul>
</div>
@endif-->

<div class="container"> 
	<div class="row">
		<div class="col-md-12">


			<form action="{{url('groupes')}}" method="post" enctype="multipart/form-data"> 

	{{csrf_field()}}
<div class="form-group @if($errors->get('titre')) has-error @endif"> 
	<label for="">Titre</label>
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
	
	 <input type="submit" value="Enregister" class="form-control btn btn-primary">
	</div>

			</form>



		</div>


	</div>
		</div>



@endsection