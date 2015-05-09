<?php
namespace Home\Controller;
use Think\Controller;

class ProController extends Controller {

	public function index(){	

		$this->display('');

	}
	public function admin(){
	if (cookie('role')!=2) {
			# code...
		$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}	
		$where['mall_id']  = cookie('userId');
		$goods = M('goods');
		$Info=$goods->where($where)->order('add_time desc')->select();
		$this->assign('list',$Info);
		// var_dump($Info);

		$this->display('Pro/admin');

	}
    //已发布列表
	public function comGood(){
	if (cookie('role')!=2) {
			# code...
		$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}	
		$where['mall_id']  = cookie('userId');
		$goods = M('goods');
		$Info=$goods->where($where)->order('add_time desc')->select();
		$this->assign('list',$Info);
		// var_dump($Info);
		$this->display('Pro/admin');
	}

	//删除

	public function delete(){
	if (cookie('role')!=2) {
			# code...
		$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}	
		$where['id']  = I('get.id');
		$goods = M('goods');
		$Info=$goods->where($where)->delete();
		// var_dump($Info);
		// $this->success('删除成功！');
		$this->redirect('Pro/admin');
	}


    //编辑
	public function edit(){
	if (cookie('role')!=2) {
			# code...
		$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}	
		$where['id']  = I('get.id');
		$goods = M('goods');
		$Info=$goods->where($where)->find();
		$des=html_entity_decode($Info['info']);	
		$this->assign('Info',$Info);	
		$this->assign('gclass',get_gclass());		
		$this->assign('des',$des);
		$whe['goodid']=I('get.id');
		$gpic = M('gpic');
		$pic = $gpic->where($whe)->select();
		$this->assign('pic',$pic);
		// var_dump($pic);		
		$this->display('Publish/edit');
		
		// var_dump($Info);
		// $this->success('删除成功！');
	}
	public function edit1(){

		$where['id']  = I('get.goodid');
		// var_dump(I('post.goodid'));
		// var_dump($where);

	}


	public function do_edit(){
	if (cookie('role')!=2) {
			# code...
		$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}			
		$title=I('post.title');
		$price=I('post.price');
		$count=I('post.kucun');
		// $count_xl=I('post.xiaoliang');
		$info=I('post.content');
		$keywords=I('post.keywords');
		$gclass=I('post.gclass');
		// $add_time=date('Y-m-d H:i:s');
		// $url_p=R('Upload/test_upload');
		$data=array(
			// 'mall_id' => $mall_id,
			'title' => $title,
			'm_price' => $price,
			// 'add_time' => $add_time,
			'count' => $count,
			// 'count_xl' => $count_xl,
			'info' => $info,
			'keywords' => $keywords,
			'gclass' => $gclass
			);
		$goods = M('goods');
		// var_dump($data);
		$where['id']=I('post.goodid');
		$Info=$goods->where($where)->setField($data);
		$Info1=$goods->where($where)->select();		
		$goodid=$goods->where($data)->getField();
		// echo($goodid);
		// var_dump($Info1);


		if($_POST['fmimg']) {

			foreach($_POST['fmimg'] as $val) {

				$picInfo=array(
					'url' => mc_save_img_base64($val),
					'goodid' => $goodid


					);
				// var_dump($picInfo);

				$gpic = M('gpic');
				// $pic = $gpic->where(array('goodid' => $goodid ))->setField($picInfo);
				$pic = $gpic->add($picInfo);

			}
		}

		
		$this->redirect('Pro/admin');


	}


	//商品留言
	public function comment($value=''){
		# code...		
		if (cookie('nickname')&&cookie('role')==1) {
			# code...
			$con['nickname']=cookie('nickname');
			$users=M('users');

			$user_id=$users->where($con)->getfield('id');
			// var_dump($user_id);
			$good_id=I('post.id');
			$content=trim(I('post.content'));
			// $good_id=I('post.id');
			// $good_id=I('post.id');
			$m=M('comment');
			$data = array(


				'good_id' => $good_id,
				'user_id' => $user_id,
				'content' => $content,
				'nickname' => cookie('nickname'),
				'add_time' => date('Y-m-d H:m:s')



				);
			// var_dump($data);


			$muser=$m->add($data);
			$this->redirect('Detail/detail_good',array('id'=>$good_id));



		}else if(cookie('nickname')&&cookie('role')==2) {

			// $this->redirect('Login/index');
			$this->error('对不起你是卖家，不允许留言！');



		}else{


			$this->redirect('Login/index');
		}





	}

	public function commentAjax($value=''){


		$con['good_id']=I('post.id');
		$m=M('comment');

		$listM=$m->where($con)->limit(8)->order('add_time desc')->select();

		$this-> ajaxReturn($listM);

	}





}