<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;

class Scateadd extends Controller
{
	public function scateadd()
	{
		$id=input("get.id");
		$arr=Db::table('type')->where('id',$id)->select();
		$this->assign('arr',$arr);
		return $this->fetch();
	}
}