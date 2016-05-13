<div class="panel panel-default">
    <div class="panel-heading">查看与编辑</div>
    <div class="panel-body">
    <form method="POST">
    @foreach (array_keys(get_object_vars($obj)) as $column)
        <div class="form-group  col-md-4">
            <label>{{ $column }}</label>
            <input type="text" class="form-control" value="{{ get_object_vars($obj)[$column] }}">
        </div>
    @endforeach
        <div class="col-md-12">
        <input type="submit" class="btn btn-default" href="#" value="提交">
        <a class="btn btn-danger" href="#">删除</a>
        </div>
    </form>
    </div>
</div>