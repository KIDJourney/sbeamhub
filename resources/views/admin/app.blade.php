@extends('layouts.app')

@section('title','SteamHub - 后台管理')

@section('content')
<!-- TODO move style to some css file-->
<style>
    .glyphicon-edit{
        font-size:20px;
    }
    .glyphicon-remove {
        color:#f15a22;
        font-size:20px;
    }
</style>
<div class="container">
    <ul class="nav nav-tabs">
        @foreach ($tabs as $tab)
        <li class="{{ $tab->css_class }}"><a href="{{ $tab->url }}">{{ $tab->name }}</a></li>
        @endforeach
    </ul>
</div>

<div class="container">
    @if (isset($models))
    <table class="table table-striped task-table">
        <thead>
            <tr>
                @foreach ($columns as $column)
                <td>{{ $column['name'] }}</td>
                @endforeach
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
            <tr>
                @foreach ($columns as $column)
                <td>{{ get_object_vars($model)[$column['attr_name']] }}</td>
                @endforeach
                <td>
                    <a href="/admin/editor/{{ $model_name }}/{{ $model->id }}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="/admin/delete/{{ $model_name }}/{{ $model->id }}"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $models->links() !!}
    @elseif (isset($view))
        <!--TODO: multiple view generate-->
        @include($view)
    @endif
</div>
@endsection