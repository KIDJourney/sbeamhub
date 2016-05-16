@extends('layouts.app')
@section('title','个人设置')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6>上传新头像</h6>
                <input type="file" class="form-control">
            </div>
        </div>
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                @if(isset($flashData))
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
                @endif
            </div>
            <h3>个人信息</h3>
            {!! Form::model($user,['method'=>'POST','url'=>'/setting','class'=>'form-horizontal','role'=>'form']) !!}
            {{--<form class="form-horizontal" role="form">--}}
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        {!! Form::text('name', NULL , ['class'=>'form-control']) !!}
                        {{--<input class="form-control" type="text" value="Jane">--}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        {!! Form::email('email',NULL,['class'=>'form-control']) !!}
                        {{--<input class="form-control" type="text" value="janesemail@gmail.com">--}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            {!! Form::close() !!}
            {{--</form>--}}
        </div>
    </div>
</div>
@stop
