<?php
namespace Api\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){

		$user=I('get.user');
		$str=str_replace("+", "%2B", $user);
		$user=base64_decode($str);
		echo($user);


	}
	public function login() {
		$user = I('post.user');
		$password = I('post.pwd');
		$where = array(
			'nickname' => $user,
			'password' => md5($password)
			);
		$users = M('users');
		$userInfo = $users->where($where)->find();
		if ($userInfo) {
			echo("login succeed");
		} else {
			echo("login error");
		}
	}


}