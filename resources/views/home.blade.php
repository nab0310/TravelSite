@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are now logged in!
                </div>
            <div class="panel-heading">What do you want to find nearby?</div>

            &nbsp;<a href="{{ url('/places/restaurant') }}">Restraunt</a>     |
            <a href="{{ url('/places/store') }}">Store</a>      |
            <a href="{{ url('/places/liquor_store') }}">Liquor Store</a>        |
            <a href="{{ url('/places/airport') }}">Airports</a>     |
            <a href="{{ url('/places/lodging') }}">Lodging</a>

            
        </div>
        <div class="panel panel-default">
                <div class="panel-heading">Search a city</div>
                &nbsp;City:  <input type="text" id="city">
                <a href="{{ url('/places/searchCity/') }}+document.getElementById('city').value"><input type="button" value="Search"></a>

        </div>
</div>
@endsection