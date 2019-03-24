@extends('layouts.master')
@section('content')
<center> <h1> Schedule Tweets</h1> </center>
<div class="row">
  <div class="col-md-12 add">
    <button id="modalBtn" class="btn btn-primary"><i class="fa fa-plus"></i>Add Tweet</button>
  </div>
</div>
<!---Groupe container-->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4 class="title"></h4>
      </div>
      <div class="content table-responsive table-full-width">
        <!--ici tableau-->
      </div>
    </div>
  </div>
</div>
<!--- ajouter groupe modal-->
<div id="simpleModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="closeBtn">&times;</span>
      <h5>Add Tweet</h5>
    </div>
    <div class="modal-body">
      <div class="row add-croup">
        <div class="col-md-12">
          <div class="form-group">
            <form method="POST" action="{{ route('post.tweet') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              @if(count($errors))
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <div class="form-group">
                <label>Add Tweet Text:</label>
                <textarea class="form-control" name="tweet"></textarea>
              </div>
              <div class="form-group">
                <label>Add Multiple Images:</label>
                <input type="file" name="images[]" multiple >
              </div>
              <div class="form-group">
                <label>date</label>
                <input type="date" class="form-control" name="date">
              </div>
              <div class="form-group">
                <button class="btn btn-success">Add New Tweet</button>
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
@section('script')
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
@endsection