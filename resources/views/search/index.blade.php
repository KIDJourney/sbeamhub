{!! Form::open(['action' => 'SearchController@show','method'=>'GET']) !!}
    {!! Form::text('key') !!}
{!! Form::button('Submit') !!}
{!! Form::close() !!}