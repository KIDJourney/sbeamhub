@extends('layouts.app')

@section('content')
<div class="container">
    <img class="center-block" src="{{ URL::asset('image/SteamHub.png') }}">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['action' => 'SearchController@show','method'=>'GET']) !!}
        <div class="input-group">
            {!! Form::text('key', '', array('class'=>'form-control')) !!}
            <span class="input-group-btn">
                {!! Form::submit('嗖嗖嗖', array('class'=>'btn btn-default')) !!}
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection