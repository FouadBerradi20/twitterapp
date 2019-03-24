@extends('layouts.master')
@section('content')
<center> <h1> My Tweets</h1> </center>
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
        <table  id="example" class="table table-hover table-striped display " >
          <thead>
            <th width="50px">No</th>
            <th>Twitter Id</th>
            <th>Message</th>
            <th>Images</th>
            <th>Favorite</th>
            <th>Retweet</th>
          </thead>
          <tbody>
            @if(!empty($data))
            @foreach($data as $key => $value)
            <tr>
              <td>{{ ++$key }}</td>
              <td> <a href="https://twitter.com/{{ $value['user']['screen_name'] }}/status/{{ $value['id'] }}" class="btn btn-simple"><i class="fa fa-twitter"></i></a></td>
              <td>{{ $value['text'] }}</td>
              <td>
                @if(!empty($value['extended_entities']['media']))
                @foreach($value['extended_entities']['media'] as $v)
                <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                @endforeach
                @endif
              </td>
              <td>{{ $value['favorite_count'] }}</td>
              <td>{{ $value['retweet_count'] }}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="6">There are no data.</td>
            </tr>
            @endif
          </tbody>
        </table>
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
                <label>Add video url:</label>
                <input type="text"  class="form-control" name="urlvideo"> 
              </div>

              <div class="form-group">
                <label>Add Multiple Images:</label>
                <input type="file" name="images[]" multiple class="form-control">
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