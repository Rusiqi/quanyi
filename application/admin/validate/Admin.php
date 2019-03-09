<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
	// 定义验证规则
	protected $rule = [
		'username' =>'require|length:6,16|chsDash',
		// 'name' => 'require|length:4,25|chsDash',
		// 'age' => 'require|number|between:1,120',
		'password'=>'require',
		// 'captcha|验证码'=>'require|captcha'
	];
	// 定义错误输出信息
	protected $message = [
		// 'Aid.require' => '班级没有填写',
		// 'Aid.number' => '班级填写不符合规则',
		// 'Aid.token' => '请勿重复提交',
		'username.require' => '你没有填写用户名',
		'username.length' => '你的用户名长度不符合要求',
		'username.chsDash' => '用户名只能是汉字、字母、数字和下划线_及破折号-',
		// 'age.require' => '年龄没有填写',
		// 'age.number' => '年龄必须是数字',
		// 'age.between' => '年龄只能在1-120之间',
		'password.require' => '你的密码没有填',
		// 'password.confirm' => '两次密码不一致',
	];

	// // 定义验证场景
	// protected $scene = [
	// 	'update' => 'Aid,name,age'
	// ];

}
?>