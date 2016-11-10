<?php $items = DB::table('checklistItems')->where('id', '3')->pluck('item');?>

@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row" id="root">
        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-body">
                    Add an item to your checklist here.
                    <input id="checklistItem" placeholder="Enter an Item" type="text"></input>
                    <form class="form-horizontal" method="post" action="{{ url('/checklist/add') }}">
                        <button type="submit" class="btn btn-primary">Add Item</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>

            <div class="panel panel-default">

                    <div class="panel-heading">Your Checklist</div>
                    
                    <div class="panel-body">
                        <div id="checkContent">
                            <form class="form-horizontal" method="post" action="{{ url('/checklist/create') }}">
                                <button type="submit" class="btn btn-primary">Load Checklist</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item }}</td>
                                    <hr>
                                </tr>
                            @endforeach
                        </div>
                    </div>

            </div>



        </div>
    </div>
</div>
@endsection
