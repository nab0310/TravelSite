@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    I am the places from the views root directory file.
                <button onclick="getGooglePlaces()">Get Places</button>
</div>
@endsection
