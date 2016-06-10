@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Report</div>
                    <div class="panel-body">
                        <form class="form-group" action="POST" url="{!! action('LiarController@report') !!}">
                            <span>TiebaID</span><input type="text" class="form-control" name="tiebaid">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
