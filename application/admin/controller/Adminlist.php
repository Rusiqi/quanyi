<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
use think\Db;

class Adminlist extends Controller
{
	// 管理员列表页面
    public function adminlist()
    {	

        $name=Session::get('name');
        $res=Db::table('admin')->where('adminname',$name)->select();
        $role=$res[0]['role'];
        $arr=Db::table('admin')->order('id','desc')->paginate(5);
        $num=count($arr);
        $this->assign("role",$role);
        $this->assign("name",$name);
        $this->assign("num",$num);        
        $this->assign("arr",$arr);	
        return $this->fetch();
    } 

    // 角色管理页面
    public function adminrole()
    {		
        return $this->fetch();
    }

    // 权限分类页面
    public function admincate()
    {		
        return $this->fetch();
    }

    // 权限管理页面
    public function adminrule()
    {		
        return $this->fetch();
    }
    
    // 管理员添加页面
    public function adminadd()
    {       
        return $this->fetch();
    }

    // 超级管理员修改资料页面
    public function adminedit()
    {
        $name=Session::get('name');
        $res=Db::table('admin')->where('adminname',$name)->select();
        $name=$res[0]['adminname'];
        $phone=$res[0]['phone'];
        $email=$res[0]['email'];
        $id=$res[0]['id'];
        $this->assign('name',$name);
        $this->assign('phone',$phone);
        $this->assign('email',$email);
        $this->assign('id',$id);
        return $this->fetch();
    }

    // 超级管理员修改资料
    public function edit()
    {
        $phone=input('post.phone');
        $email=input('post.email');
        $id=input('post.id');
        $time=date("Y-m-d H:i:s");//修改的时间

        // 判断新添加的管理员名字是否存在
        $res=Db::table('admin')->where('id','not in',$id)-> select();
        if($res){
            for($i=0;$i<count($res);$i++){
                if($name==$res[$i]['adminname']){
                    return 2;
                }elseif($phone==$res[$i]['phone']){
                    return 3;
                }elseif($email==$res[$i]['email']){
                    return 4;
                }
            }            
        }
        $row=Db::table('admin')->where('id',"$id")->update(['phone'=>$phone,'email'=>$email,'update_time'=>$time]);
        if($row){
            return 1;
        }else{
            return 0;
        }               
    }

    // 管理员添加
    public function add()
    {                     
        $name=input('post.name');
        $phone=input('post.phone');
        $email=input('post.email');
        $role=input('post.role');
        $pass=input('post.pass');
        $time=date("Y-m-d H:i:s");

        $passs=md5($pass);
        // return $pass;
        if($name != null && $phone != null && $email != null && $pass != null){
            if(preg_match("/^[1][3-9][0-9]{9}$/",$phone) && preg_match("/^\w+@\w+(\.\w+){1,3}$/",$email)){
                // 判断新添加的管理员名字是否存在
                $res=Db::table('admin')->where('adminname',$name)->select();
                if($res){
                    return 2;
                }
                // 判断手机号是否已注册
                $res=Db::table('admin')->where('phone',$phone)->select();
                if($res){
                    return 3;
                }
                // 判断邮箱是否已注册
                $res=Db::table('admin')->where('email',$email)->select();
                if($res){
                    return 4;
                }
                // 要添加的字段
                $data=['id'=>null,'adminname'=>$name,'phone'=>$phone,'email'=>$email,'role'=>$role,'create_time'=>$time,'status'=>1,'pass'=>$passs];
                $row=Db::table('admin')->insert($data);
                if($row){
                    return 1;
                }else{
                    return 0;
                }
            }     
            
        }
        return $this->fetch();
    }
    // 管理员禁用
    public function adminstatus()
    {
        $id=input('get.id');
        $str=Db::table("admin")->where("id",$id)->value('status');
        if($str==1){
            $res=Db::table('admin')->update(['status' => 0,'id'=>$id]);
            if($res){
                return 3;
            }else{
                return 4;
            }
        }
    }
    // 管理员启用
    public function adminstatus1()
    {
        $id=input('get.id');
        $str=Db::table("admin")->where("id",$id)->value('status');
        if($str==0){
            $res=Db::table('admin')->update(['status' => 1,'id'=>$id]);
            if($res){
                return 1;
            }else{
                return 2;
            }
        }
    }

    // 管理员删除
    public function del()
    {
        $id=input('post.id');
        $row=Db::table('admin')->where('id',$id)->delete();
        if($row){
            return 1;
        }else{
            return 2;
        }
    }

    // 普通管理员页面
    public function grlist()
    {
        $name=Session::get('name');
        $res=Db::table('admin')->where('adminname',$name)->select();
        $this->assign('res',$res);
        return $this->fetch();
    }

    // 普通管理员修改个人资料页面
    public function gredit()
    {
        $name=Session::get('name');
        $res=Db::table('admin')->where('adminname',$name)->select();
        $name=$res[0]['adminname'];
        $phone=$res[0]['phone'];
        $email=$res[0]['email'];
        $id=$res[0]['id'];
        
        $this->assign('phone',$phone);
        $this->assign('email',$email);
        $this->assign('id',$id);
        return $this->fetch();
    }

    // 普通管理员修改资料
    public function gredit1()
    {
        $phone=input('post.phone');
        $email=input('post.email');
        $id=input('post.id');
        $time=date("Y-m-d H:i:s");//修改的时间

        // 判断新添加的管理员名字是否存在
        $res=Db::table('admin')->where('id','not in',$id)-> select();
        if($res){
            for($i=0;$i<count($res);$i++){
                if($name==$res[$i]['adminname']){
                    return 2;
                }elseif($phone==$res[$i]['phone']){
                    return 3;
                }elseif($email==$res[$i]['email']){
                    return 4;
                }
            }            
        }
        $row=Db::table('admin')->where('id',"$id")->update(['phone'=>$phone,'email'=>$email,'update_time'=>$time]);
        if($row){
            return 1;
        }else{
            return 0;
        }               
    }
}
?>