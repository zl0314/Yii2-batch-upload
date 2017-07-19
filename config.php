<?php
/**
 * @author Aaron Zhanglong <815818648@qq.com>
 * 多图上传组件
 * @Date: 2017-07-14
 */
use yii\helpers\Url;

return [
    /* 上传图片配置项 */
    'fieldName' => "fileData", /* 提交的图片表单名称 */
    'maxSize' => 2097152, /* 上传大小限制，单位B */
    'allowFiles'=> [".png", ".jpg", ".jpeg", ".gif", ".bmp"], /* 上传图片格式显示 */
    'pathFormat'=> "/uploads/{yyyy}/{mm}/{dd}/{date}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
    'uploadFilePath' => str_replace('backend', 'frontend', $_SERVER['DOCUMENT_ROOT']), /* 文件保存绝对路径   */
    'uploadType' => 'upload', //remote远程图片   base64 base64编码 upload 正常的上传方法,
    'serverUrl' => Url::to('/admin/upload/upload_more'),
    'trueDelete' => 'true' //为TRUE是，点确定后， 将会把真实图片删除，为false时， 只会把父元素移除， 不会删除真实图片
];