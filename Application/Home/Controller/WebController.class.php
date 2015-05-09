<?php
namespace Home\Controller;
use Think\Controller;
class WebController extends Controller {
	public function index(){
		$this->display();
	}


	public function upload(){

		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->savePath = './Public/Uploads/'; // 设置附件上传目录
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
        	$this->error($upload->getError());
        	}else{// 上传成功
        		// $this->success('上传成功！');
        		dump($info);
        	}

     }

     public function ueditor(){
        $data = new \Org\Util\Ueditor();
        echo $data->output();
    }




    public function api(){

        // echo(I('get.content'));
        $content=I('get.content');
        //替换加号
        $str=str_replace("+", "%2B", $content);
        $content=base64_decode($str);
        echo($content);



        
    }


    








}