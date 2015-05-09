<?php
$st=new SaeStorage();
return array(
    //SAE数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => SAE_MYSQL_HOST_M, // 主库服务器地址
    'DB_NAME'   =>SAE_MYSQL_DB, // 数据库名
    'DB_USER'   =>SAE_MYSQL_USER, // 用户名
    'DB_PWD'    => SAE_MYSQL_PASS, // 密码
    'DB_PORT'   => SAE_MYSQL_PORT, // 端口
    'DB_PREFIX' => '', // 数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集
    'FILE_UPLOAD_TYPE' => 'Sae',
    'TMPL_PARSE_STRING'=>array(
        //'/Public/upload'=>sae_storage_root('Public').'/upload'
        //'/Public/upload' => $st->getUrl('upload','img'),
        // '/Public/upload' => $st->getUrl('upload'),
        // $st->getUrl('public','upload')
        '/Public/upload' => $st->getUrl('public','upload'),
        ),
    'SHOW_PAGE_TRACE' =>false,
  );
