<?php
namespace Api\Controller;
use Think\Controller;
class ItemController extends Controller {
	public function index(){
		$goods = M('goods');
		$Info=$goods->where($where)->limit(9)->select();
		// var_dump($Info);
		
		$this->ajaxReturn($Info);

	}



}