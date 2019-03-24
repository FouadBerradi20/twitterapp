

<!--
<div class="container"> 
	<div class="row">
		<div class="col-md-12">
			
			
<h1> Users Lists: </h1>
<div class="pull-right">
	<a href="{{url('cvs/create')}}" class="btn btn-success "> Nouveau  :  </a>
</div>
-->
<!--
<table class="table">
	
<head>
		
<tr>
	
	<th>Title</th>
	<th>Presentation</th>
	<th>Date</th>
	<th>Actions</th>
</tr>
</head>
<body>
	@foreach($cvs as $cv)
	<tr>
		
<td>{{$cv->titre}} <br> {{ $cv->user->name }}</td>
<td>{{$cv->presentation}}</td>
<td>{{$cv->created_at}}</td>
<td>

	<form action="{{url('cvs/'.$cv->id)}}" method="post" >
		{{csrf_field()}}
		{{method_field('DELETE')}}
		<a href=""  class="btn btn-primary">Details</a>
	<a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-dafault">Edit</a>
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
	
</td>
</tr>
	@endforeach




</body>
</table>
-->	

<!--
<div class="row">
@foreach($cvs as $cv)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
		<img src="{{asset('storage/'.$cv->pho)}}" alt="..." >
      <div class="caption">
        <h3>{{$cv->titre}}</h3>
        <p></p>
        <p><a href="" class="btn btn-primary" role="button">Show</a> 
		<a href= "{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-warning" role="button">Edit</a>
		 <a href="" class="btn btn-danger" role="button">Delete</a></p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endforeach

</div>
-->

@extends('layouts.app')

@section('content')
	

<!--
<div class="container"> 
	<div class="row">
	<div class="col-md-12">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{session()->get('success')}}
	</div>
	@endif
	-->
	<div class="container"> 
	<h1> CVS </h1>
	<div class="row">
	<div class="pull-centered cutsom-css" >
	<a href="{{url('cvs/create')}}" class="btn btn-warning"> Nouveau </a>
	</div>
	</div>
	<div class="row">
	@foreach($cvs as $cv)
	<div class="col-md-4">
	  <div class="thumbnail">
		
		  <img src="{{asset('storage/'.$cv->pho)}}" alt="Fjords" style="width:100%;height: 500px">
		  <div class="caption">
		  <h3>{{$cv->titre}}</h3>
			<p>Lorem ipsum...</p>
			<p>
			   
				<form action="{{url('cvs/'.$cv->id)}}" method="post">
					{{csrf_field()}}
					{{method_field('DELETE')}}
					<a href="{{url('cvs/'.$cv->id)}}" class="btn btn-primary">Show</a>
					@can('update', $cv)
					<a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-warning">Editer</a>
					@endcan
					@can('delete', $cv)
				<input type="submit" value="supprimer" class="btn btn-danger">
				@endcan
				</form>
			</p>
		  </div>
		
	  </div>
	</div>
	@endforeach
  </div>
</div>
</div>
</div>
</div>
 @endsection