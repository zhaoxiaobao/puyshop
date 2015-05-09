<?php

namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index() {
        $this->display();
    }
    public function login() {
        $user = I('post.user');
        $password = I('post.password');
        $where = array(
            'nickname' => $user,
            'password' => md5($password)
        );
        foreach ($where as $key => $value) {
            if (empty($value)) {
                $this->error('用户名或密码不能为空', U('Login/index'));
                exit;
            }
        }
        $users = M('users');
        $userInfo = $users->where($where)->find();
        if ($userInfo) {
            cookie('userId', $userInfo['id']);
            cookie('nickname', $userInfo['nickname']);
            cookie('role', $userInfo['role']);
            $data['last_login_time'] = date('Y-m-d H:m:s');
            $data['last_login_ip'] = get_client_ip();
            $userInfo = $users->where($where)->save($data);
            $this->redirect('Index/role');
        } else {
            $this->error('登录失败', U('Login/index'));
        }
    }
    //注销cookie
    public function logout() {
        cookie('userId', null);
        cookie('nickname', null);
        cookie('role', null);
        $this->redirect('Index/index');
    }
    public function findpass() {
        $this->display();
    }
    public function do_findpass() {
        // code...
        $where['nickname'] = I('post.finduser');
        $where['email'] = I('post.findmail');
        $users = M('users');
        $userInfo = $users->where($where)->find();
        // var_dump($userInfo);
        // $this->display();
        if ($userInfo) {
            // code...
            cookie('userId', $userInfo['id']);
            $this->redirect('Login/findpass1');
        }
        $this->error('找回失败！');
    }
    public function findpass1() {
        $this->display();
    }
    public function do_findpass1() {
        $where['id'] = cookie('userId');
        $data['password'] = md5(I('post.password'));
        $users = M('users');
        $userInfo = $users->where($where)->save($data);
        $this->success('找回成功');
        $this->redirect('Index/index');
    }
    public function findpass2() {
        $this->display();
    }
}

