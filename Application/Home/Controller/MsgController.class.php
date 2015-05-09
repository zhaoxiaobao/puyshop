<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {

	public function _initialize(){
    	# code...
		$userId=cookie('userId');
		$role=cookie('role');
		if (empty($userId)||$userId==null) {
			$this->error('您还没有登录',U('Login/index'));
		}

	}

	public function index(){
		$this->display();
	}

	//检测是否有站内信

	public function checkmsg($value='') {
        # code...

		$where['rec_id']=cookie('userId');
		$where['status']=0;
		$m=M('message');
		$count=$m->where($where)->count();

		$data['status']='';
		$data['count']=$count;

		$this->ajaxReturn($data);
	}



	public function znx($value='') {
        # code...
		$this->display();
	}

    //发送

	public function post($value='') {
        # code...
		if (cookie('role')!=1) {
			# code...
			$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}	

		$rec_id=I('post.rec_id');
		$send_id=cookie('userId');
		$msg_text=I('post.msg_text');
		$data = array(
			'send_id' =>$send_id, 
			'rec_id' =>$rec_id, 
			'msg_text' =>$msg_text,
			'status' =>'0',
			'add_time' =>date('Y-m-d H:m:s')
			);
		$m=M('message');
		$lists=$m->add($data);
		// var_dump($data);
		$this->redirect('index/index');
	}

	//回复
	public function reply($value=''){
		# code...
		$this->display('');

	}


	public function do_reply($value=''){
		$rec_id=I('post.rec_id');
		$send_id=cookie('userId');
		$msg_text=I('post.msg_text');
		$data = array(
			'send_id' =>$send_id, 
			'rec_id' =>$rec_id, 
			'msg_text' =>$msg_text,
			'status' =>'0',
			'add_time' =>date('Y-m-d H:m:s')
			);
		$m=M('message');
		$lists=$m->add($data);

		if (cookie('role')==1) {
        	# code...
			$this->redirect('Stu/znxlist');
		}elseif (cookie('role')==2) {
        	# code...
			$this->redirect('Com/znxlist');
		}

	}

	//删除
	public function msgdel($value=''){
		# code...
		$id=I('get.id');
		$where = array(
			'id' =>$id, 
			);
		$m=M('message')->where($where)->delete();
		// var_dump(cookie('role'));
		if (cookie('role')==1) {
        	# code...
			$this->redirect('Stu/znxlist');
		}elseif (cookie('role')==2) {
        	# code...
			$this->redirect('Com/znxlist');

		}
		
	}

	//已读
	public function msgred($value=''){
		# code...
		$id=I('get.id');
		$where = array(
			'id' =>$id, 
			);
		$data = array(
			'status' =>1, 
			);
		$m=M('message')->where($where)->setField($data);
		if (cookie('role')==1) {
        	# code...
			$this->redirect('Stu/znxlist');
		}elseif (cookie('role')==2) {
        	# code...
			$this->redirect('Com/znxlist');

		}
	}



}