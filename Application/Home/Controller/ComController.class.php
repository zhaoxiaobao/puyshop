<?php
namespace Home\Controller;
use Think\Controller;
class ComController extends Controller {

    //初始化

    public function _initialize(){
    	# code...
    	$userId=cookie('userId');
        $role=cookie('role');
        if (empty($userId)||$userId==null) {
            $this->error('您还没有登录',U('Login/index'));
        }
        if ($role!=2) {
            $this->error('您不是商家用户',U('Index/index'));
        }
        
    }

    public function index(){
        $where['id']=cookie('userId');
        $users=M('users');
        $muser=$users->where($where)->find();
        // var_dump($muser);
        $whe['mall_id']=cookie('userId');
        $mall=M('mall');
        $mau=$mall->where($whe)->find();
        $this->assign('muser',$muser);
        $this->assign('mau',$mau);
        // var_dump($mau);
        $this->display();
    }


    //店铺管理
    public function profile(){
        $where['id']=cookie('userId');
        $users=M('users');
        $muser=$users->where($where)->find();
        $whe['mall_id']=cookie('userId');
        $mall=M('mall');
        $mau=$mall->where($whe)->find();
        $this->assign('muser',$muser);
        $this->assign('mclass',get_mclass());
        $this->assign('mau',$mau);
        $this->display();

    }

    public function do_profile(){
        $where['mall_id']=cookie('userId');
        $mall_name=I('post.mall_name');
        $class=I('post.class');
        $address=trim(I('post.address'));
        $contact_name=I('post.contact_name');
        $contact_tel=I('post.contact_tel');
        $intro=trim(I('post.info'));
        $pic_url=I('post.pic_url');
        $file = array(
            'mall_name' =>$mall_name ,
            'class' =>$class ,
            'address' =>$address ,
            'contact_name' =>$contact_name ,
            'info' =>$intro ,
            // 'pic_url' =>$pic_url ,
            );
        // var_dump( $file);
        $mall=M('mall');
        $muser=$mall->where($where)->save($file);
        $data = array(
            'mobile' =>$contact_tel ,
            'zfb' =>I('post.zfb')
            );
        $con['id']=cookie('userId');
        $users=M('users');
        $user=$users->where($con)->setField($data);
        $this->redirect('Com/index');

    }

    //保存信息
    public function savefile(){
        # code...
        $where['mall_id']=cookie('userId');
        $mall_name=I('post.mall_name');
        $class=I('post.class');
        $address=I('post.address');
        $contact_name=I('post.contact_name');
        $contact_tel=I('post.contact_tel');
        $intro=I('post.intro');
        $pic_url=I('post.pic_url');
        $file = array(

            'mall_name' =>$mall_name ,
            'class' =>$class ,
            'address' =>$address ,
            'contact_name' =>$contact_name ,
            'contact_tel' =>$contact_tel ,
            'intro' =>$intro ,
            'pic_url' =>$pic_url ,


            );
        $mall=M('mall');
        $muser=$mall->where($where)->save($file);
        // var_dump($muser);
    }

    //站内信
    public function znxlist($value=''){
        # code...
        $where['rec_id']=cookie('userId');
        $m=M('message');
        $listM=$m->where($where)->select();
        $this->assign('Info',$listM);
        $this->display();

    }













}