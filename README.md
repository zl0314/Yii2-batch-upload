# Yii2-batch-upload
Yii2多图片上传
# 功能说明
此小部件实现了文章或项目添加的时候，可以传多张图片，也以对上传成功的图片进行删除（如果配置项 trueDelete 为真， 则服务器上的真实图片也会删除）

此小部件不能在上传图片的时候， 选N张图片，只能一张一张的选择进行上传


# 安装说明
将下载的文件夹放入公共目录，本实例路径为（/common/widgets/），请根据项目实例自行安排，
UploadAction.php文件内有使用说明，请进行参考。

config:
```
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
```

controller:  

```
public function actions() {
        return [
            'upload_more'=>[
                'class' => 'common\widgets\batch_upload\UploadAction'
            ]
        ];
    }
```

view:  

```
<?=$form->field($model, 'pics')->widget('common\widgets\batch_upload\FileUpload')?>
```

上传图片插件为AjaxUpload3.9，无刷新上传图片，使用前， 请查看config.php进行配置，默认【图片表单名称】为fileData

#实现预览

功能实现

![image](screenshot/pic1.jpg)

小部件存放目录

![image](screenshot/pic2.jpg)
