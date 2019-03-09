<?php
	namespace app\index\controller;
	use think\Controller;

	class Timeline extends Controller
	{
	    public function timeline()
	    {
	        return $this->fetch();
	    }
	}
?>