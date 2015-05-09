<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class UploadController extends Controller {

	public function index(){



		// $this->display();

	}


	public function test_upload($ftype = 'image') {
        //这里划分一下允许上传的文件类型，与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。
		if ($ftype == 'image') {
			$ftype = 'jpg,gif,png,jpeg,bmp';
		} else if ($ftype == 'file') {
			$ftype = 'zip,rar,doc,xls,ppt';
		}
		$setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 6 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => $ftype, //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => './Uploads/', //保存根路径
            'savePath' => '', //保存路径
            );
		/* 调用文件上传组件上传文件 */
        //实例化上传类，传入上面的配置数组
		$this->uploader = new Upload($setting, 'Local');
		$info = $this->uploader->upload($_FILES);
        //这里判断是否上传成功
		if ($info) {
            //// 上传成功 获取上传文件信息
			foreach ($info as &$file) {
                //拼接出上传目录
				$file['rootpath'] = __ROOT__ . ltrim($setting['rootPath'], ".");
                //拼接出文件相对路径
				$file['filepath'] = $file['rootpath'] . $file['savepath'] . $file['savename'];
				// echo($file['filepath']);
				// return $file['filepath'];
			}
            //这里可以输出一下结果,相对路径的键名是$info['upload']['filepath']
            // dump($info['upload']);
            return $file['filepath'];
			exit();
			// $this->success('上传成功！');
		} else {
            //输出错误信息
			exit($this->uploader->getError());
		}
	}

	


}