@if(isset($donator))
    {!! Form::model($donator, ['method'=>'PATCH','action'=>array('Admin\DonatorController@update', $donator->id)]) !!}
    {!! Form::text('name') !!}<br>
    {!! Form::text('amount') !!}<br>
    {!! Form::submit() !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['method'=>'POST','action'=>array('Admin\DonatorController@store')]) !!}
    {!! Form::text('name') !!}<br>
    {!! Form::text('amount') !!}<br>
    {!! Form::submit() !!}
    {!! Form::close() !!}
@endif