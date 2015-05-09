<?php
namespace Home\Controller;
use Think\Controller;
class StuController extends Controller {
    public function index(){

    	$userId=cookie('userId');
        $role=cookie('role');
        // var_dump($role);
        if (empty($userId)||$userId==null) {
            $this->error('您还没有登录',U('Login/index'));
        }
        if ($role!=1) {
            $this->error('用户权限出错',U('Index/index'));
        }

        $users = M('users');

        $user=$users->where(array("id"=>$userId))->find();
        // var_dump($user);
        $this->assign('user',$user);
        $this->display();

        // echo "<a href=".U('Stu/stufile').">资料</a>";

    }

    public function ajax(){
        # code...
        $where['student_id']=cookie('userId');
        $student=M('student');
        $user=$student->where($where)->find();
        // var_dump($user);
        $this->assign('name',$user['name']);
        $this->assign('bday',$user['bday']);
        $this->assign('gender',$user['gender']);
        $this->assign('user',$user);

        $jinfo=json_encode($user);
        // echo($jinfo);


        $this->ajaxReturn($jinfo);

    }

    //用户编辑

    public function stufile(){
    	# code...
        if (cookie('role')!=1) {
            # code...
            $this->error('对不起，您无权访问！',U('Login/index'));exit;
        }   
        $where['student_id']=cookie('userId');
        $where1['id']=cookie('userId');
        $student=M('student');
        $user=$student->where($where)->find();
        // var_dump($user);

        $users = M('users');
        $user1=$users->where($where1)->find();
        // var_dump($user1);
        $this->assign('name',$user['name']);
        $this->assign('bday',$user['bday']);
        $this->assign('gender',$user['gender']);
        $this->assign('user',$user);

        // $jinfo=json_encode($user);
        // echo($jinfo);


        // $this->ajaxReturn($jinfo);
        $this->assign('user',$user);
        $this->assign('user1',$user1);
        $this->display('Stu/file');

    }



    public function do_stufile(){
        # code...
        if (cookie('role')!=1) {
            # code...
            $this->error('对不起，您无权访问！',U('Login/index'));exit;
        }   
        $where['student_id']=cookie('userId');
        $student=M('student');
        $stu=M('users');
        // var_dump($user);
        if (IS_POST) {
            # code...
            $nickname=I('post.nickname','');
            $bday=I('post.birthdayYear','')."-".I('post.birthdayMonth','')."-".I('post.birthdayDay','');
            $gender=I('post.sex','');
            $contact_tel=I('post.contact_tel','');
            $zfb=I('post.zfb','');
            $data = array(
                // 'name' =>$name , 
                'bday' =>$bday , 
                'gender' =>$gender , 
                );
            // var_dump($data);
            $user=$student->where($where)->save($data);

            $data1 = array(
                'nickname' =>$nickname , 
                'mobile' =>$contact_tel , 
                'zfb' =>$zfb , 
                );
            // var_dump($data);
            $user1=$stu->where(array('id' =>cookie('userId')))->save($data1);
        }
        $this->redirect('Stu/index');
    }


    //留言列表

    public function msglist($value=''){
        # code...
        if (cookie('role')!=1) {
            # code...
            $this->error('对不起，您无权访问！',U('Login/index'));exit;
        }   
        $con['user_id']=cookie('userId');
        $m=M('comment');
        $listM=$m->where($con)->limit(10)->order('add_time desc')->select();
        // var_dump($listM);
        $this->assign('listM',$listM);
        $this->display('');

    }

    //留言删除

    public function msgdel($value=''){
        # code...
        if (cookie('role')!=1) {
            # code...
            $this->error('对不起，您无权访问！',U('Login/index'));exit;
        }   
        $con['id']=I('get.id');
        $m=M('comment');
        $listM=$m->where($con)->delete();
        // var_dump($listM);
        // $this->assign('listM',$listM);
        $this->redirect('Stu/msglist');
        // $this->success('删除成功');



    }


    //商品收藏
    public function follow($value=''){
        # code...
        if (cookie('role')==1) {
            # code...
            $good_id=I('post.good_id');
            $user_id=cookie('userId');
            $data = array(
                'good_id' =>$good_id, 
                'user_id' =>$user_id,
                'status' =>'1',
                'type' =>'0'
                );

            $m=M('follow');
            $lists=$m->where($data)->find();

            if (empty($lists)) {
                # code...
                $listM=$m->add($data);
                $this->ajaxReturn($data);
            }else{
                # code...


            }

            
        }else {
            # code...


        }


    }


    //收藏列表
    public function followlist($value=''){
        # code...

        $con['user_id']=cookie('userId');
        // var_dump(cookie('userId'));
        $m=M('follow');
        $listM=$m->where($con)->limit(10)->select();
        // var_dump($listM);

        // $con1['good_id']=
        $this->assign('listM',$listM);

        $this->display();
    }


    //收藏删除
    public function followdel($value=''){
        # code...
        if (cookie('role')!=1) {
            # code...
            $this->error('对不起，您无权访问！',U('Login/index'));exit;
        }   
        $con['id']=I('get.id');
        // var_dump(cookie('userId'));
        $m=M('follow');
        $listM=$m->where($con)->delete();
        $this->redirect('Stu/followlist');
    }


    //站内信
    public function znxlist($value='') {
        # code...
        if (cookie('role')!=1) {
            # code...
            $this->error('对不起，您无权访问！',U('Login/index'));exit;
        }   
        $where['rec_id']=cookie('userId');
        $m=M('message');
        $listM=$m->where($where)->select();
        // var_dump($listM);
        $this->assign('Info',$listM);
        $this->display();
    }

















}