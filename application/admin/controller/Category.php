<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;

class Category extends Controller
{
	public function category()
	{	
		$name=input('post.name');
		$typeres=Db::table('type')->where('name','like','%'.$name.'%')->find();
		$this->assign('name',$name);
		$this->assign('typeres',$typeres);
		$arr=Db::table("type")->field("id,name,pid,path,picname,concat(path,id) as bpath")->order('bpath')->paginate(8);
		// dump($arr);
		$num=Db::table("type")->count();
		$this->assign('num',$num);
		$this->assign('arr',$arr);
		return $this->fetch();
	}

}