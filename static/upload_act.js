/**
 * Created by zhang on 2017/7/13.
 */

//删除图片
function delpic(obj){
    var pic = $(obj).parent().find('img').attr('src');
    var trueDeleteStr = trueDelete == 'true' ? '确认后，服务器上的真实图片也会被删除' : '';
    if(confirm('确认要删除图片吗？' + trueDeleteStr)){
        if(trueDelete == 'true'){
            pic = encodeURIComponent(pic);
            $.get(serverUrl + '?action=delete&pic='+pic, function(res){
                if(res == 'ok'){
                    $(obj).parent().remove();
                }
            });
        }else{
            $(obj).parent().remove();
        }
    }
}

new AjaxUpload($("#pics_button"),{
    action: serverUrl,
    type:"POST",
    data:{  },
    autoSubmit:true,
    responseType:'json',//"json",
    name : fileData,
    onChange: function(file, ext){
        var o = this._input;
        var oid = $(o).attr('id');
        //检查格式
        if (!(ext && /^(jpg|jpeg|JPG|JPEG|PNG|gif)$/i.test(ext))) {
            alert('文件格式不正确');
            return false;
        }else{
            //判断图片是否合法
            var oFile = document.getElementById(oid).files[0];
            if(parseInt(oFile.size) > allow_size ){
                var size = allow_size / 1024 / 1024;
                alert('大小不能超过'+( Math.round(size*10)/10)+'M');
                return false;
            }
        }
        return true;
    },
    onComplete: function(file, resp){ //完成后回调函数
        console.log(resp);
        if(typeof(upload_callback) == 'function'){
            upload_callback(resp);
        }else{
            var html = '<div class="col-xs-6 col-md-3" style="position: relative"><span class="del_pic" onclick="delpic(this)"></span>';
            html += '<input type="hidden" value="'+resp.url+'" name="'+inputName+'[]" ><a class="thumbnail" title="点击查看大图" href="'+resp.url+'" target="_blank"><img class="img-responsive" src="'+resp.url+'"></a>';
            html += '</div>'
            $('#pics_preview').append(html );
        }
    }
});