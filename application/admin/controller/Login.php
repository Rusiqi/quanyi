<?php
namespace app\admin\controller;
use think\Controller;
use think\Validate;
use think\Session;
use think\Db;


class Login extends Controller
{	
	public function login()
	{  	
		Session::delete('name');
    	Session::delete('pass');
		return $this->fetch();
	}

	public function dengl()
	{	
	
		$name=input('post.name');
		$pass=input('post.pass');
		$arr=Db::table('admin')->where('adminname',$name)->where('status',1)->find();
		if($arr['status']==0){
			return 6;
		}
		$upass=md5($pass);
		if(empty($name)){
			//判断用户名是否存在
			return 0;
		}elseif(empty($pass)){
			//判断密码是否存在
			return 2;
		}
		if(!empty($name)){
			if($name!==$arr['adminname']){
				//判断用户名是否错误
				return 5;
			}else{
				//判断密码是否正确
				if($arr['pass']==$upass){
					Session::set('name',$name);
					Session::set('pass',$pass);
					$ip=request()->ip();
	                Session::set('ip',$ip);
	                $time=date("Y-m-d H:i:s");
	                Session::set('time',$time);
					return 1;
				}else{
					return 4;
				}
			}
		}else{
			return 3;
		}

		// dump($arr);
		// $validate = validate('Admin');
  //       if (!$validate->check(input("post."))) {
  //           $this->error($validate->getError());
  //       }  
		// if(!$name==$arr['username']){
		// 	$this->error("管理员不存在");
		// }else{
		// 	if($pass==$arr['pass']){
		// 		Session::set('name',$name);
		// 		Session::set('pass',$pass);
		// 		$ip=request()->ip();
  //               Session::set('ip',$ip);
  //               $time=date("Y-m-d H:i:s");
  //               Session::set('time',$time);
		// 		$this->success("登录成功","/admin/index/index",'',2);
		// 	}else{
		// 		$this->error("密码错误");
		// 	}
		// }
	}

}