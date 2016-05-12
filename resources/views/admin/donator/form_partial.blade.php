@if(isset($donator))
    {!! Form::model($donator, ['method'=>'PATCH','action'=>array('Admin\DonatorController@update', $donator->id)]) !!}
    Name:{!! Form::text('name') !!}<br>
    Amount:{!! Form::text('amount') !!}<br>
    {!! Form::submit() !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['method'=>'POST','action'=>array('Admin\DonatorController@store')]) !!}
    Name:{!! Form::text('name') !!}<br>
    Amount:{!! Form::text('amount') !!}<br>
    {!! Form::submit() !!}
    {!! Form::close() !!}
@endif