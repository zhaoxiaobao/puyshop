<?php


//截取
  function chinesesubstr($str, $start, $len) { // $str指字符串,$start指字符串的起始位置，$len指字符串长度
        $strlen = $start + $len; // 用$strlen存储字符串的总长度，即从字符串的起始位置到字符串的总长度
        for($i = $start; $i < $strlen;) {
            if (ord ( substr ( $str, $i, 1 ) ) > 0xa0) { // 如果字符串中首个字节的ASCII序数值大于0xa0,则表示汉字
                $tmpstr .= substr ( $str, $i, 3 ); // 每次取出三位字符赋给变量$tmpstr，即等于一个汉字
                $i=$i+3; // 变量自加3
            } else{
                $tmpstr .= substr ( $str, $i, 1 ); // 如果不是汉字，则每次取出一位字符赋给变量$tmpstr
                $i++;
            }
        }
        return $tmpstr; // 返回字符串
    }


//获取常量
function get_mclass(){
	$mclass = M('class');
	$info = $mclass->select();
	return $info;
}

//获取常量
function get_gclass(){
	$gclass = M('gclass');
	$info = $gclass->select();
	return $info;
}

//检查是否登录
function checklog(){
	// # code...
	if (cookie('userId')=='') {
		# code...
		// $this->error('对不起，你还没有登录！');
		exit();
	}

}




//保存BASE64图片
function mc_save_img_base64($img) {

	$curDateTime = date("YmdHis");
	$ymd = date("Ymd");
	$randNum = rand(1000, 9999);
	    // $out_trade_no = mc_user_id() . $curDateTime . $randNum;
	$out_trade_no = $curDateTime . $randNum;
	$attached_type = '';
	if(strstr($img,'data:image/jpeg;base64,')) {
		$img_base = str_replace('data:image/jpeg;base64,', '', $img);
		$attached_type = 'jpg';
	} elseif(strstr($img,'data:image/png;base64,')) {
		$img_base = str_replace('data:image/png;base64,', '', $img);
		$attached_type = 'png';
	} elseif(strstr($img,'data:image/gif;base64,')) {
		$img_base = str_replace('data:image/gif;base64,', '', $img);
		$attached_type = 'gif';
	} else {
		return $img;
	};
	if($attached_type!='') {
		$img_decode = base64_decode($img_base);
			$fileName = 'uploads/'.$ymd.'/'.$out_trade_no.'.'.$attached_type; // 获取需要创建的文件名称
			$storage = new SaeStorage();
			$domain = 'images';
			// $destFileName = 'write_test.txt';
			// $content = 'Hello,I am from the method of write';
			$attr = array('encoding'=>'gzip');
			$result = $storage->write($domain,$fileName, $img_decode, -1, $attr, true);



			// if (!is_dir('uploads/'.$ymd.'/')){
			// 	mkdir('Uploads/'.$ymd.'/', 0777); // 使用最大权限0777创建文件
			// };
			// if (!file_exists($fileName)) { // 如果不存在则创建
			// 	// 检测是否有权限操作
			// 	if (!is_writeable($fileName)) {
			// 		@chmod($fileName, 0777); // 如果无权限，则修改为0777最大权限
			// 	};
			// 	// 最终将d写入文件即可
			// 	file_put_contents($fileName, $img_decode);
			// };
			$file_url = 'http://puyshop-images.stor.sinaapp.com/'.$fileName;
			return $file_url;
		};

	};



	/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
	function getpage(&$m,$where,$pagesize=15){
    $m1=clone $m;//浅复制一个模型
    $count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
    $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
    $p=new Think\Page($count,$pagesize);
    $p->lastSuffix=false;
    $p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录  共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev','上一页');
    $p->setConfig('next','下一页');
    $p->setConfig('last','末页');
    $p->setConfig('first','首页');
    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');

    $p->parameter=I('get.');

    $m->limit($p->firstRow,$p->listRows);

    return $p;
}
//通过id获取用户名
function getname($id=''){
	$con['id']=$id;
	$users=M('users');
	$user=$users->where($con)->find();

	return $user['nickname'];



}



?>