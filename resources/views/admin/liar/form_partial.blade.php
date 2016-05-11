{!! Form::model($liar, ['method'=>'PATCH','action'=>array('Admin\LiarController@update', $liar->id)]) !!}
    {!! Form::text('tiebaid') !!}<br>
    {!! Form::text('steamnick') !!}<br>
    {!! Form::text('steamid') !!}<br>
    {!! Form::text('taobaoid') !!}<br>
    {!! Form::text('alipayaccount') !!}<br>
    {!! Form::text('reason') !!}<br>
    {!! Form::submit() !!}
{!! Form::close() !!}