<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/30
// +----------------------------------------------------------------------
define('APP_ROOT', __DIR__);
define('APP_SRC', __DIR__ . '/src');
define('APP_RESOURCES', __DIR__ . '/resources');
define('APP_DATA', __DIR__ . '/data');


if(!is_file(APP_DATA . '/install.lock')) {
    // 初始化
    require_once APP_SRC. '/function/install.func.php';
    installWeb();
}