<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;

class Typefind extends Controller
{
	public function typefind(){
		$name=input('post.name');
		// dump($name);
		$id=Db::table('type')->where('name',$name)->value('id');
		// dump($id);
		$tname=Db::table('type')->where('name',$name)->value('name');
		// $pid=Db::table('type')->where('name',$name)->value('pid');
		$rest=Db::table('type')->where('pid',$id)->select();
		$res=Db::table('type')->where('name','like','%'.$name.'%')->select();
		// dump($rest);
		$num=count($rest)+1;
		$num1=count($res);
		if($num==0){
			$num=$num1;
		}
		$this->assign('tname',$tname);
		$this->assign('num',$num);
		// $this->assign('num1',$num1);
		$this->assign('name',$name);
		$this->assign('rest',$rest);
		$this->assign('res',$res);
		return $this->fetch();
	}
}