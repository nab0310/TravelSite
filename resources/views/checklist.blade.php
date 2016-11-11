@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row" id="root">
        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-body">
                    Add an item to your checklist here.
                    <form class="form-horizontal" method="post" action="{{ url('/places/checklist/add') }}">
                        <div class="form-group">
                            <input id="checklistItem" name="item" id="" placeholder="Enter an Item" type="text"></input>
                            <button type="submit" class="btn btn-primary">Add Item</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">

                    <div class="panel-heading">Your Checklist</div>
                    
                    <div class="panel-body">
                        <div id="checkContent">
                            <div id="list">
                            @foreach($items as $key => $value)
                                    <input type="checkbox" name="isDone" value="idDone" {{ $value->isDone != 'N' ? 'checked' : '' }}>
                                    {{ $value-> item }}
                                    <hr>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('input[name=isDone]').change(function(){
                            if($(this).is(':checked'))
                            {
                                // Checkbox is checked.
                                alert("You have checked this off");
                            }
                            else
                            {
                                // Checkbox is not checked.
                                alert("You have unchecked this.");

                            }    

                        });
                    </script>
                    <script type="text/javascript">
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    </script>

            </div>



        </div>
    </div>
</div>
@endsection
