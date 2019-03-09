<?php
	namespace app\index\controller;
	use think\Controller;

	class Resource extends Controller
	{
	    public function resource()
	    {
	        return $this->fetch();
	    }
	}
?>