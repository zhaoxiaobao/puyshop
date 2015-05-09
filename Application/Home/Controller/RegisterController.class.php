<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {

    public function index(){

        $this->display('Register/index');

    }
    //用户注册
    public function userReg(){
    	# code...
        $name=I('post.user');
        $mobile=I('post.phone');
        $email=I('post.mail');
        $password=I('post.password');
        $repassword=I('post.repassword');
        $type=I('post.type');
        $data=array(
           'nickname'=>$name,
           'mobile'=>$mobile,
           'email'=>$email,
           'password'=>md5($password),
           'role'=>$type,
           'register_time'=>date('Y-m-d H:m:s')
           );
        foreach ($data as $key => $value) {
            if (empty($value)){
                $this->error('注册信息不完整!',U('Register/index'));
                exit();
            }
        }

        $con['nickname']=$name;
        $users=M('users');
        $user=$users->where($con)->select();


        if ($user) {
            # code...
            $this->error('用户已注册！',U('Register/index'));
            exit();

        }

        if ($password!=$repassword) {
            # code...
            $this->error('两次输入密码不同',U('Register/index'));
        }else {
            # code...
         $user=$users->add($data);
         $userId=$users->where($data)->getfield('id');

         if ($type==2) {
               # code...
            $mall=M('mall');    
            $muser=$mall->add(array('mall_id'=>$userId));

        }

        if ($type==1) {
               # code...
            $student=M('student');
            $suser=$student->add(array('student_id'=>$userId));

        }

        $this->redirect('Login/index');
       }

    }

    //检测用户类型
    public function checkType(){
        # code...
                $userId=cookie('userId');
                $role=cookie('role');
                if (empty($userId)||$userId==null) {
                    $this->error('您还没有登录',U('Login/index'));
                }
                if ($role!=2) {
                    $this->error('您不是卖家用户!',U('Index/index'));
                }
    }





}