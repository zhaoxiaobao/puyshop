<?php
namespace Home\Controller;
use Think\Controller;

class PublishController extends Controller {

	public function index(){


		
		$this->assign('gclass',get_gclass());
		$this->display('Publish/publish');
				// $this->display();




	}


	public function publish(){
		# code...
		if (cookie('role')!=2) {
            # code...
			$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}   
		$this->display();




	}
	
	public function ueditor(){
		$data = new \Org\Util\Ueditor();
		echo $data->output();
	}



	public function edit(){


		if (cookie('role')!=2) {
            # code...
			$this->error('对不起，您无权访问！',U('Login/index'));exit;
		}   
		$mall_id=cookie('userId');
		// if (cookie('role')==2) {
		// 	# code...
		// 	exit();
		// }
		$title=I('post.title');
		$price=I('post.price');
		$count=I('post.count');
		$count_xl=I('post.xiaoliang');
		$info=I('post.content');
		$keywords=I('post.keywords');
		$gclass=I('post.gclass');
		$add_time=date('Y-m-d H:i:s');
		// $url_p=R('Upload/test_upload');
		$data=array(
			'mall_id' => $mall_id,
			'title' => $title,
			'm_price' => $price,
			'add_time' => $add_time,
			'count' => $count,
			'count_xl' => $count_xl,
			'info' => $info,
			'keywords' => $keywords,
			'gclass' => $gclass,
			// 'goods_thumb'=>'./Uploads/thumb/'.$name.'.jpg'
			);

		// echo($goodid);
		// foreach ($data as $key => $value) {
		// 	if (empty($value)){
  //                   //dump($data);
		// 		$this->error('信息不完整!');
		// 		exit();
		// 	}
		// }

		$goods = M('goods');
		$Info=$goods->add($data);
		$goodid=$goods->where($data)->getField();

		if($_POST['fmimg']) {

			foreach($_POST['fmimg'] as $val) {

				$picInfo=array(
					'url' => mc_save_img_base64($val),
					'goodid' => $goodid

					);
				// var_dump($picInfo);
				$gpic = M('gpic');
				$pic = $gpic->add($picInfo);
				

			}

			// $whepic['goodid']=$goodid;
			// $gpic = M('gpic');
			// $pic = $gpic->where($whepic)->find();
			// dump($pic);

			// $goods = M('goods');
			// $datap['goods_thumb']=$pic;

			// dump($datap);

			// $good = $goods->where($data)->setField($datap);
		}

		$this->redirect('Pro/admin');


	}






}