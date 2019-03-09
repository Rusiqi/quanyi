<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;

class Goods extends Controller
{
	public function goods()
	{
		$type=Db::table("type")->field("id,name,pid,path,concat(path,id) as bpath")->order('bpath')->select();
		// $num=count($type);
		// dump($type);
		// for($i=0;$i < $num; $i++) { 
		// 	$typename[]=$type[$i]['name'];
		// }
		$this->assign('type',$type);
		return $this->fetch();
	}
}