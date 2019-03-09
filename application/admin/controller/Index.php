<?php
namespace app\admin\controller;
use think\Controller;
Use think\Session;
use think\Db;

class Index extends Controller
{
	public function index()
	{
		$name=Session::get('name');
		$res=Db::table('admin')->where('adminname',$name)->select();
        $role=$res[0]['role'];
        $this->assign('role',$role);
		$arr=Session::get();
		// dump($arr);
		if(!Session::has('name')){
			$this->redirect("/admin/login/login");
		}else{
			$this->assign('name',$name);
			return $this->fetch();
		}
		
	 	//   dump($info);die;
		
	}
}