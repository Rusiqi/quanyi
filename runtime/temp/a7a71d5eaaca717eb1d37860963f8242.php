<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpStudy\WWW\quanyi\public/../application/admin\view\scateadd\scateadd.html";i:1545725241;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <!-- <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no"> -->
        <link rel="stylesheet" type="text/css" href="/static/admin/css/x-admin.css" /><script type="text/javascript" src="/static/admin/layer/layer.js"></script><script type="text/javascript" src="/static/admin/laydate/laydate.js"></script>
    </head>
    
    <body>
    
        <div class="x-body">
        <?php foreach($arr as $v): ?>
            <form class="layui-form"  enctype="multipart/form-data" id="data1" action="/admin/cateadd/addtype" method="post">
                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        <?php echo $v['name']; ?>子类<span class="x-red">*</span>
                    </label>
                    <input type="hidden" name="tid" value="<?php echo $v['id']; ?>" >
                    <input type="hidden" name="tpath" value="<?php echo $v['path']; ?>" >
                    <div class="layui-input-inline">
                        <input type="text" id="cname" name="tname" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        选择图片<span class="x-red">*</span>
                    </label>
                    <div class="layui-input-inline">
                        <input type="file"  name="pic" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save" lay-submit="" onclick="typeadd()">
                        添加
                    </button>
                </div>
            <?php endforeach; ?>
            </form>
        </div>
        
        <!-- <script src="../include/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="../include/js/x-layui.js" charset="utf-8">
        </script> -->
        <script type="text/javascript" src="/static/admin/lib/layui/layui.js"></script><script type="text/javascript" src="/static/admin/js/x-layui.js"></script><script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
        <script type="text/javascript">
           function typeadd(){
              var index = parent.layer.getFrameIndex(window.name);
              //关闭当前frame
              parent.layer.close(index);
              // var formdata=new FormData($('#data1')[0]);
              // tname=$("#cname").val();
              // tid=$('#tid').val();
              // path=$('#tpath').val();
              // alert(1);
              // window.close();
              // $.ajax({
              //   type:'post',
              //   url:'/admin/cateadd/addtype',
              //   data:fromdata,
              //   contentType: false,
              //   cache: false,
              //   processData: false,
              //   success:function(data){
              //     // alert(data);
              //     if(data==1){
              //       layer.msg('添加成功!',{icon:1,time:2000});
              //       //获得frame索引
              //       window.parent.location.reload();
              //       parent.layer.closeAll('iframe');
              //     }else if(data==0){
              //       layer.msg('添加失败!',{icon:2,time:3000});
              //     }else{
              //       layer.msg('未输入分类名!',{icon:2,time:3000});
              //     }
              //   }
              // })
           }
        </script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            
              // //自定义验证规则
              // form.verify({
              //   nikename: function(value){
              //     if(value.length < 5){
              //       return '昵称至少得5个字符啊';
              //     }
              //   }
              //   ,pass: [/(.+){6,12}$/, '密码必须6到12位']
              //   ,repass: function(value){
              //       if($('#L_pass').val()!=$('#L_repass').val()){
              //           return '两次密码不一致';
              //       }
              //   }
              // });
            });
        </script>
    </body>

</html>