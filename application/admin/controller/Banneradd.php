<?php
namespace app\admin\controller;
use think\Db;
use think\Session;
use think\Controller;
use app\admin\model\Banner;

class Banneradd extends Controller
{	
	public function banneradd()
	{
		return $this->fetch();
	}
	
	public function add()
    {   
    	// 获取表单上传文件 例如上传了001.jpg
    	$arr=input("post.");
    	// $link=input("post.link");
    	// $desc=input("post.desc");
    	// return $desc;
    	// halt($arr);
    	$file=request()->file('pic');
    	$time=date("Y-m-d H:i:s");
        // 移动到框架应用根目录/public/uploads/ 目录下
        // $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        // $picname=$info->getSaveName();
        // $data=['id'=>null,'status'=>1,'yimg'=>$picname,'addtime'=>$time,'desc'=>$arr['desc'],'href'=>$arr['link']];
        // $res=Db::table('banner')->insert($data);
        // if($res){
        // 	return 1;
        // }
        	if($file){
            $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $picname=$info->getSaveName();
                $data=['id'=>null,'status'=>1,'yimg'=>$picname,'addtime'=>$time,'desc'=>$arr['desc'],'href'=>$arr['link']];
                $res=Db::table('banner')->insert($data);
                if($res){
                	return 1;
                }else{
                	return 0;
                }

            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        
    
    }
	
}