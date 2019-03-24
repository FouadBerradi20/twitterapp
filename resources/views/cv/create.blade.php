@extends('layouts.app')


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


			<form action="{{url('cvs')}}" method="post" enctype="multipart/form-data"> 

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
	<label for="">Presentation</label>
	<textarea type="text" name="presentation" class="form-control">{{old('presentation')}}</textarea>
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
	
	 <input type="submit" value="Enregister" class="form-control btn btn-primary">
	</div>

			</form>



		</div>


	</div>
		</div>



@endsection