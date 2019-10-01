<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/9/30
// +----------------------------------------------------------------------

function installWeb()
{
    $domain_array = file(APP_RESOURCES . '/domain.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($domain_array as $domain) {
        // 生成域名根目录
        $domain = strtolower(trim($domain));
        $domain_dir = APP_DATA . '/' . $domain;
        if (!is_dir($domain_dir)) {
            mkdir($domain_dir, 0775);
        }
        // 随机一个模板分配给域名
        $template_array = glob(APP_RESOURCES . '/template/*.html');
        shuffle($template_array);
        $number = str_replace('.html', '', basename($template_array[0]));
        if(!is_file($domain_dir . '/template.inc')) {
            file_put_contents($domain_dir . '/template.inc', '<?php return '.var_export($number, true). ';');
        }
        // 分配站点关键词
        $res = file(APP_RESOURCES . '/keyword/keys.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        shuffle($res);
        $keys = explode('|', trim($res[0]));
        shuffle($keys);
        if(!is_file($domain_dir . '/keys.inc')) {
            file_put_contents($domain_dir . '/keys.inc', '<?php return '.var_export($keys, true). ';');
        }
        // 分配站点栏目

    }
}