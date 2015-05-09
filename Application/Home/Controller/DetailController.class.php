<?php
namespace Home\Controller;
use Think\Controller;

class DetailController extends Controller {

	public function index(){
		$this->display();
	}


	public function detail_good(){
		$id=I('get.id');
		$goods = M('goods');
		$Info=$goods->where(array('id'=>$id))->find();
		$des=html_entity_decode($Info['info']);
		$title=$Info['title'];
		// var_dump($Info);
		$where['goodid']=$_GET['id'];
		$gpic = M('gpic');
		$pic = $gpic->where($where)->select();
		$this->assign('pic',$pic);
		$this->assign('Info',$Info);
		$this->assign('des',$des);
		// var_dump($Info);	
		$where2['mall_id']=$Info['mall_id'];
		$where2['goodid']!=$id;
		$goods2 = M('goods');
		$Info2 = $goods2->where($where2)->limit(6)->select();
		$count = $goods2->where($where2)->count();
		$mall = M('mall');
		$shopInfo = $mall->where($where2)->find();
		// var_dump($shopInfo);
		$where3['id']=$Info['mall_id'];
	    $users = M('users');
		$shopInfo1 = $users->where($where3)->find();

		$conCom['good_id']=I('get.id');
		$mCom=M('comment');
		$listMCom=$mCom->where($conCom)->limit(8)->order('add_time desc')->select();
		// var_dump($listMCom);



		//收藏
		$data = array(
			'good_id' =>I('get.id'), 
			'user_id' =>cookie('userId'),
            // 'status' =>'1',
            // 'type' =>'0'
			);
		$m=M('follow');
		$listM=$m->where($data)->find();
        // var_dump($listM);
		if (empty($listM)) {
        	# code...
			$follows='false';
		}else{
			$follows='true';
		}
		$this->assign('Info2',$Info2);
		$this->assign('count',$count);
		$this->assign('shopInfo',$shopInfo);
		$this->assign('shopInfo1',$shopInfo1);
		$this->assign('listMCom',$listMCom);
		$this->assign('follow',$follows);
		$this->display('Detail/index');
		

	}

	


}