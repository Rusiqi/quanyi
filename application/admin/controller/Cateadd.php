<?php
namespace app\admin\controller;
use think\Controller;
Use think\Session;
use think\Db;

class Cateadd extends Controller
{
	public function cateadd()
	{	
		
		return $this->fetch();
	}

	public  function addtype()
	{
		$name=input('post.name');
		if(!empty($name)){
			$pid=0;
			$path='0'.",";
			$data=['id'=>null,'name'=>$name,'pid'=>$pid,'path'=>$path];
			$res=Db::table('type')->insert($data);
			if($res){
				return 1;
			}else{
				return 0;
			}
		}
		// if(empty($sname) && empty($name)){
		// 	return 3;
		// }
		$sname=input('post.tname');
		$tid=input('post.tid');
		$tpath=input('post.tpath');
		$file=request()->file('pic');
		if($file){
	        $info = $file->validate(['size'=>1024*1024*2,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'typepic');
	        $picname=$info->getSaveName();
    	}
		// dump($file);
		// return $tid;
		if(!empty($sname)){
			// $arr=Db::table('type')->where('id',$tid)->select();
			$spid=$tid;
			$spath=$tpath.$tid.",";
			$sdata=['id'=>null,'name'=>$sname,'pid'=>$spid,'path'=>$spath,'picname'=>$picname];
			$res=Db::table('type')->insert($sdata);
			if($res){
				 echo '<script>window.close();</script>';
			}
		}else{
			return 3;
		}
		
	}

	public function del()
	{
		$id=input('post.id');
		$pid=input('post.pid');
		$img=Db::table('type')->where('id',$id)->value('picname');
		$bool = Db::table('type')->where("pid",$id)->select();
		$img1=ROOT_PATH .'public'. DS . 'typepic/'.$img;
		if($bool==null){
			if(file_exists($img1)){
				$ok=unlink($img1);
			}
			if($ok){
				$res=Db::table('type')->where('id',$id)->delete();
				if($res){
				return 1;
				}
			}
		}else{
			return 0;
		}
	}
}