<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Model\User;
use App\Model\Liar;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Tab{
    public $name, $url, $css_class;
    public function __construct($name, $url='#', $css_class='')
    {
        $this->name = $name;
        $this->url = $url;
        $this->css_class = $css_class;
    }
}

class AdminController extends Controller
{   
    private function tabs($i=-1)
    {
        // TODO: url should not be hard-coded?
        $tabs = array(
            new Tab('管理员须知', '/admin'),
            new Tab('用户管理', '/admin/user'),
            new Tab('负面清单', '/admin/blacklist'),
            new Tab('站点统计', '/admin/statistic'),
            );
        if ($i != -1):
            $tabs[$i]->css_class = 'active';
        endif;
        return $tabs;
    }
    
    public function index()
    {
        return view('admin.app', ['tabs'=>$this->tabs(0)]);
    }
    
    public function user_administration()
    {
        $columns = array(
            ['name'=>'昵称', 'attr_name'=>'name'],
            ['name'=>'邮箱', 'attr_name'=>'email'],
            );
        $models = DB::table('users')->select('id', 'name', 'email')->Paginate(40);
        return view('admin.app', [
            'tabs'=>$this->tabs(1),
            'columns'=>$columns,
            'models'=>$models,
            'model_name'=>'user',
            ]);
    }
    
    public function blacklist_administration()
    {
        $columns = array(
            ['name'=>'贴吧ID', 'attr_name'=>'tiebaid'],
            ['name'=>'STEAM ID', 'attr_name'=>'steamid'],
            ['name'=>'支付宝账号', 'attr_name'=>'alipayaccount'],
            );
        $models = DB::table('liars')->select('id', 'tiebaid', 'steamid', 'alipayaccount')->Paginate(40);
        return view('admin.app', [
            'tabs'=>$this->tabs(2),
            'columns'=>$columns,
            'models'=>$models,
            'model_name'=>'liar',
            ]);
    }
    
    public function statistic()
    {
        return view('admin.app', ['tabs'=>$this->tabs(3)]);
    }
    
    public function model($model)
    {
        return redirect(['user'=>'/admin/user', 'liar'=>'/admin/blacklist'][$model]);
    }
    
    public function model_display($model, $id)
    {
        $obj = DB::table($model.'s')->where('id', $id)->first();
        return view('admin.app', ['tabs'=>$this->tabs(),'view'=>'admin.model.display', 'obj'=>$obj]);
    }
    
    public function model_delete_confirmation($model, $id)
    {
        return view('admin.app', ['tabs'=>$this->tabs(),'view'=>'admin.model.delete']);
    }
    
    public function model_delete($model, $id)
    {
        DB::table($model.'s')->where('id', $id)->delete();
        return redirect('admin/model/'.$model);
    }
}
