<div class="panel panel-default">
    <div class="panel-heading">确认删除？</div>
    <div class="panel-body">
        <div class="alert alert-warning">删除后无法恢复。请仔细核对条目。</div>
        <div class="alert alert-warning">TODO: 条目展示</div>
        <form method="POST">
        {{ csrf_field() }}
            <input type="submit" class="btn btn-danger" href="#" value="确认"></input>
            <a href="#" onclick="window.history.back(); return false;" class="btn btn-default">返回</a>
        </form>
    </div>
</div>
