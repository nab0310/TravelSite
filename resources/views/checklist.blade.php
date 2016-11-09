<?php
$nLine = "\n";
?>

<!--  <?php $items = DB::table('checklistItems')->where('id', '3')->pluck('item');
    $returnVals = "";
    foreach ($items as $item) {
       $returnVals += $item;
       $returnVals += PHP_EOL;
    }
?> -->

@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row" id="root">
        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-body">
                    Add an item to your checklist here.
                    <input id="checklistItem" placeholder="Enter an Item" type="text"></input>
                </div>
            </div>

            <div class="panel panel-default">

                    <div class="panel-heading">Your Checklist</div>
                    
                    <div class="panel-body">
                        <div id="checkContent">

                        </div>
                    </div>

            </div>



        </div>
    </div>
</div>

<script>
     $(document).ready(function(){
         $("#checkContent").html(" <?php $items = DB::table('checklistItems')->where('id', '3')->pluck('item');
    $returnVals = "";
    foreach ($items as $item) {
       echo $item;
    }
?>");
        
     });
 </script>
@endsection
