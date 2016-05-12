@if(isset($liar))
    {!! Form::model($liar, ['method'=>'PATCH','action'=>array('Admin\LiarController@update', $liar->id)]) !!}
    Tiebaid:{!! Form::text('tiebaid') !!}<br>
    Steamnick:{!! Form::text('steamnick') !!}<br>
    Steamid:{!! Form::text('steamid') !!}<br>
    TaobaoId:{!! Form::text('taobaoid') !!}<br>
    AlipayAccount{!! Form::text('alipayaccount') !!}<br>
    Reason:{!! Form::text('reason') !!}<br>
    {!! Form::submit() !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['method'=>'POST','action'=>array('Admin\LiarController@store')]) !!}
    Tiebaid:{!! Form::text('tiebaid') !!}<br>
    Steamnick:{!! Form::text('steamnick') !!}<br>
    Steamid:{!! Form::text('steamid') !!}<br>
    TaobaoId:{!! Form::text('taobaoid') !!}<br>
    AlipayAccount{!! Form::text('alipayaccount') !!}<br>
    Reason:{!! Form::text('reason') !!}<br>
    {!! Form::submit() !!}
    {!! Form::close() !!}
@endif