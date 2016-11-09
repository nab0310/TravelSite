@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                <h1>Post Form</h1><hr>
				<h3>Please insert the informations below:</h3>
				<form class="form-horizontal" method="post" action="{{ url('/posts/create') }}">
					<div class="form-group">
					    <label for="Post" class="col-lg-2 control-label">
					        Post
					    </label>
					    <div class="col-lg-10">
					        <input type="text" class="form-control" id="Post" name= "Post">
					    </div>
					</div>
					<div class="form-group">
					    <div class="col-lg-10 col-lg-offset-2">
					        <button type="reset" class="btn btn-default">Cancel</button>
					        <button type="submit" class="btn btn-primary">Create</button>

					    </div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
				<tr>
					<td>{{ Auth::user()->email }}</td>
				</tr>
                @foreach($posts as $key => $value)
             	<tr>
	             	<hr>
	                <td>{{ $value->ID }}</td>
	                <td>{{ $value->Post }}</td>
	                <td>{{ $value->UserID }}</td>
                </tr>

                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection