<?php
/**
 * @author Aaron Zhanglong <815818648@qq.com>
 * 多图上传组件
 * @Date: 2017-07-14
 */
namespace common\widgets\batch_upload\assets;

use yii\web\AssetBundle;

class FileUploadAsset extends AssetBundle
{
    public $css = ['main.css'];
    public $js = ['ajaxupload.3.9.js','upload_act.js'];
    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init(){
        $this->sourcePath = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'static';
    }
}