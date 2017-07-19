<script>
    var allow = 1;
    var allow_size ='<?php echo $config['maxSize']?>';
    var serverUrl = '<?php echo $config['serverUrl']?>';
    var fileData = '<?php echo $config['fieldName']?>';
    var inputName = '<?=$inputName?>';
    var trueDelete = '<?=$config['trueDelete']?>';
</script>

<div id="main">
    <div class="demo">
        <div id="pics_button" class="btn">
            <span>添加图片</span>
        </div>
        <p>最大<?php echo ceil($config['maxSize']/1024/1024)?>M，支持jpg，gif，png格式。</p>

        <div class="row" id="pics_preview">
            <?php if(!empty($value)):?>
                <?php $value = json_decode($value, 1);?>
                <?php foreach($value as $k => $r):?>
                    <div class="col-xs-6 col-md-3" style="position: relative">
                        <span class="del_pic"  onclick="delpic(this)"></span>
                        <input type="hidden" value="<?=$r?>" name="<?=$inputName?>[]" >
                        <a title="点击查看大图" href="<?=$r?>" class="thumbnail" target="_blank"><img  src="<?=$r?>"></a>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>

    </div>
</div>
