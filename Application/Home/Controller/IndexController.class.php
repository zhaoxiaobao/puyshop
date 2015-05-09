<?php

namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$goods = M('goods');
		$p=getpage($goods,$where,15);
		$list=$goods->field(true)->where($where)->order('add_time desc')->select();
		$this->Info=$list;
		$this->page=$p->show();
		$count =$goods->count();
		$this->assign('gclass',get_gclass());
		$this->assign('count',$count);
		$this->display();
	}


	public function search(){
		$goods = M('goods');
		$where['title|info']  = array('like', "%{$_GET['keyword']}%");
		$p=getpage($goods,$where,15);
		$order = array(
			'add_time' => 'desc' ,
			);
		$Info=$goods->field(true)->where($where)->order($order)->select();
		$count =$goods->field(true)->where($where)->count();
		$this->assign('Info',$Info);
		$this->assign('gclass',get_gclass());
		$this->assign('count',$count);
		$this->page=$p->show();
		$this->assign('keyword',I('get.keyword'));
		$this->display('Index/list');

	}


	public function ajax(){

		$data = array(

			'status' => I('post.name')

			);

		$this->ajaxReturn($data);

	}



	public function sort(){
		$where['title|info']  = array('like', "%{$_GET['keyword']}%");
		$goods = M('goods');
	    $p=getpage($goods,$where,15);
		$or='m_price';
		$order = array(
			$or => 'asc' ,
			);
		$Info=$goods->where($where)->order($order)->select();
		$count =$goods->field(true)->where($where)->count();
		$this->assign('Info',$Info);
		$this->assign('gclass',get_gclass());
		$this->assign('count',$count);


		$this->page=$p->show();
		$this->display('Index/list');

	}



	public function clist(){
		$where['gclass']  = $_GET['gclass'];
		$goods = M('goods');
		$Info=$goods->where($where)->order('add_time desc')->limit(9)->select();
		$count =$goods->where($where)->count();
		$this->assign('Info',$Info);
		$this->assign('count',$count);
		$this->assign('gclass',get_gclass());
	    // var_dump(get_gclass());
		$this->display('Index/clist');
	}



	public function plist(){
		$where['gclass']  = $_GET['id'];
		$goods = M('goods');
		$Info=$goods->where($where)->order('add_time desc')->limit(9)->select();
		$count =$goods->where($where)->count();
		$this->assign('Info',$Info);
		$this->assign('count',$count);
		$this->assign('gclass',get_gclass());
	    // var_dump(get_gclass());
		$this->display('Index/clist');
	}




    //通过角色进入不同用户界面
	public function role(){
		$role=cookie('role');
		// var_dump($id);
		if ($role==1) {
    		# code...
			$this->redirect('Stu/index');
		}elseif ($role==2) {
    		# code...
			$this->redirect('Com/index');
		}
	}







	
}