@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row" id="root">
        <div class="col-md-6">
            <div class="panel panel-default">

                @yield('title')

                    <div class="panel-body">
                        <div id="content"></div>
                        <div id="map"></div>
                        @yield('script')
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00&libraries=places&callback=searchPlace" async defer></script>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection