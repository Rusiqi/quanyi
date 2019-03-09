<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;


class Banner extends Controller
{
	public function banner()
	{
		return $this->fetch();
	}
	
}