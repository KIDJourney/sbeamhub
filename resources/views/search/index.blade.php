@extends('layouts.app')

@section('title','SteamHub')

@section('content')
    <div class="container">
        <img class="center-block" src="{{ URL::asset('image/SteamHub.png') }}">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['action' => 'SearchController@show','method'=>'GET']) !!}
            <div class="input-group">
                {!! Form::text('key', '', array('id'=>'searchBar','class'=>'form-control')) !!}
                <span class="input-group-btn">
            {!! Form::submit('嗖嗖嗖', array('class'=>'btn btn-default')) !!}
            </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <link href="//cdn.bootcss.com/jqueryui/1.12.0-rc.2/jquery-ui.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jqueryui/1.12.0-rc.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $.get('{!! action('ApiController@recentSearch') !!}',
                    function (data) {
                        var autoComplete = data;
                        $('#searchBar').autocomplete({
                            source: autoComplete
                        });
                    }
            );
        })
    </script>
@stop