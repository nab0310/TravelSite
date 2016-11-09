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
                        <button onclick="showMoreRestraunts()">Show More!</button>
                        @yield('script')
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00&libraries=places&callback=searchPlace" async defer></script>
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id = "resultsOfQPX"></div>
                    <div class="panel-heading">Sites to help with Flights:</div>
                    <ul>
                        <li><a href="https://www.studentuniverse.com/">Student Universe</a></li>
                        <li><a href="http://www.statravel.com/?from_US=true">STA Travel</a></li>
                        <li><a href="https://www.cheapoair.com/deals/student-travel?CAID=33301&FpAffiliate=LinkShare&FpSub=TnL5HPStwNw-MU4pRra7W_inDdqJo4g0kg">Cheap Air</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection