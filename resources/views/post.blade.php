@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                    @foreach($posts as $key => $value)
                 <tr>
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