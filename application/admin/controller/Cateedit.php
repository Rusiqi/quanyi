<?php
namespace app\admin\controller;
use think\Controller;
Use think\Session;
use think\Db;

class Cateedit extends Controller
{
	public function cateedit()
	{
		$id=input("get.id");
		$arr=Db::table('type')->where('id',$id)->select();
		$this->assign('arr',$arr);
		return $this->fetch();
	}

	public function update()
	{
		$id=input('post.id');
		$pid=input('post.pid');
		$name=input('post.sname');
		$bool = Db::table('type')->where("pid",$id)->select();
		if($bool==null){
			$res=Db::table('type')->where('id',$id)->update(['name'=>$name]);
			if($res){
				return 1;
			}else{
				return 3;
			}
		}else{
			return 2;
		}
		
		// return $pid;
	}
}