<?php
$mod = 'admin';
include('../Common/Core_brain.php');
if($adminData['adminRank']== 2) {
  echo "您的账号没有权限使用此功能";
  exit;
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>网站配置 - <?php echo conf('SiteName');?> - 后台管理中心</title>
<link rel="icon" href="favicon.ico" type="image/ico">
<meta content="<?php echo conf('Descriptison');?>" name="descriptison">
<meta content="<?php echo conf('Keywords');?>" name="keywords">
<meta name="author" content="<?php echo conf('Name');?>">
<link href="../assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/admin/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../assets/admin/css/style.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-t-15">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;
$mods=['base'=>'网站设置','indexmk'=>'首页配置','emailset'=>'其他配置'];
?>
        <ul class="nav nav-tabs page-tabs">
  <?php foreach($mods as $key=>$name){echo '<li class="'.($key==$mod?'active':null).'"><a href="web_config.php?mod='.$key.'">'.$name.'</a></li>';} ?>
        </ul>
<?php
if($mod=='base'){
?>
        <div class="tab-content">
          <div class="tab-pane active">
            <form onsubmit="return saveSetting(this)" method="post" name="edit-form" class="edit-form">
              <div class="form-group">
                <label for="SiteName">网站名称</label>
                <input class="form-control" type="text" name="SiteName" value="<?php echo conf('SiteName');?>" placeholder="请输入网站名称" >
                <small class="help-block">调用方式：<code>conf('SiteName')</code></small>
              </div>
              <div class="form-group">
                <label for="Name">顶部文字</label>
                <input class="form-control" type="text" name="Name" value="<?php echo conf('Name');?>" placeholder="请输入网站顶部文字" >
                <small class="help-block">调用方式：<code>conf('Name')</code></small>
              </div>
              <div class="form-group">
                <label for="Url">网站域名</label>
                <input class="form-control" type="text" id="Url" name="Url" value="<?php echo conf('Url');?>" placeholder="请输入网站域名" >
                <small class="help-block">调用方式：<code>conf('Url')</code></small>
              </div>
              <div class="form-group">
                <label for="Keywords">站点关键词</label>
                <input class="form-control" type="text" name="Keywords" value="<?php echo conf('Keywords');?>" placeholder="请输入站点关键词" >
                <small class="help-block">网站搜索引擎关键字</small>
              </div>
              <div class="form-group">
                <label for="Descriptison">站点描述</label>
                <textarea class="form-control" rows="5" name="Descriptison" placeholder="请输入站点描述" ><?php echo conf('Descriptison');?></textarea>
                <small class="help-block">网站描述，有利于搜索引擎抓取相关信息</small>
                <small class="help-block">调用方式：<code>conf('Descriptison')</code></small>
              </div>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Vaptcha_Open">系统人机验证开关</label>
                  <div class="clearfix">
                    <label class="lyear-radio radio-inline radio-primary">
                      <input type="radio" name="Vaptcha_Open" value="0" <?=conf('Vaptcha_Open')==0?"checked":""?>><span>禁用</span>
                    </label>
                    <label class="lyear-radio radio-inline radio-primary">
                      <input type="radio" name="Vaptcha_Open" value="1" <?=conf('Vaptcha_Open')==1?"checked":""?>><span>启用</span>
                    </label>
                  </div>
                <small class="help-block">调用方式：<code>conf('Vaptcha_Open')</code>则直接输出代码，<code>conf('Vaptcha_Opens');$Vaptcha_Opens;</code>输出1或0</small>
              </div>
              <div class="form-group col-xs-6">
                <label for="Vaptcha_Vid">人机验证单元Vid</label>
                <input class="form-control" type="text" id="Vaptcha_Vid" name="Vaptcha_Vid" value="<?php echo conf('Vaptcha_Vid');?>" placeholder="请输入人机验证单元Vid" >
                <small class="help-block">前往<a href="https://www.vaptcha.com/">Vaptcha</a>免费注册开通</small>
              </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>
          </div>
        </div>
<?php
}elseif($mod=='indexmk'){
?>
        <div class="tab-content">
          <div class="tab-pane active">
            <form onsubmit="return saveSettings(this)" method="post" name="edit-form" class="edit-form" role="form">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>底部版权©设置</legend>
</fieldset>
              <div class="form-group">
                <label for="Index_About">底部版权</label>
             <input class="form-control" type="text" name="Index_About" value="<?php echo conf_index('Index_About');?>" placeholder="请输入你的版权">
<small class="help-block">如星燎科技</small>
              </div>
              <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>个人资料设置</legend>
</fieldset>
              <div class="form-group">
                <label for="Index_Links">首页头像</label>
                 <input class="form-control" type="text" name="Index_Links" value="<?php echo conf_index('Index_Links');?>" placeholder="请输入图片链接">
                <small class="help-block">此地方仅首页个人信息部分图片使用</small>
              </div>
<div class="form-group">
                <label for="Index_Style">第一行</label>
                <input class="form-control" type="text" name="Index_Slide1" value="<?php echo conf_index('Index_Slide1');?>" placeholder="请输入第一行内容（推荐名称的英文）">
              </div>
              <div class="form-group">
                <label for="Index_Style">第二行</label>
                <input class="form-control" type="text" name="Index_Slide2" value="<?php echo conf_index('Index_Slide2');?>" placeholder="请输入第二行内容（推荐个人网名或真实姓名）">
              </div>
              <div class="form-group">
                <label for="Index_Style">第三行</label>
                <input class="form-control" type="text" name="Index_Slide3" value="<?php echo conf_index('Index_Slide3');?>" placeholder="请输入第三行内容（推荐使用文案）">
              </div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>友情链接</legend>
</fieldset>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Index_Services_t1">链接一名称</label>
                <input class="form-control" type="text" name="Index_Services_t1" value="<?php echo conf_index('Index_Services_t1');?>" placeholder="请输入链接一名称">
              </div>
              <div class="form-group col-xs-6">
                <label for="Index_Services_d1">链接一网址</label>
                <input class="form-control" type="text" name="Index_Services_d1" value="<?php echo conf_index('Index_Services_d1');?>" placeholder="请输入链接一网址">
              </div>
              </div>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Index_Services_t2">链接二名称</label>
                <input class="form-control" type="text" name="Index_Services_t2" value="<?php echo conf_index('Index_Services_t2');?>" placeholder="请输入链接二名称">
              </div>
              <div class="form-group col-xs-6">
                <label for="Index_Services_d2">链接二网址</label>
                <input class="form-control" type="text" name="Index_Services_d2" value="<?php echo conf_index('Index_Services_d2');?>" placeholder="请输入链接二网址">
              </div>
              </div>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Index_Services_t3">链接三名称</label>
                <input class="form-control" type="text" name="Index_Services_t3" value="<?php echo conf_index('Index_Services_t3');?>" placeholder="请输入链接三名称">
              </div>
              <div class="form-group col-xs-6">
                <label for="Index_Services_d3">链接三网址</label>
                <input class="form-control" type="text" name="Index_Services_d3" value="<?php echo conf_index('Index_Services_d3');?>" placeholder="请输入链接三网址">
              </div>
              </div>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Index_Services_t4">链接四名称</label>
                <input class="form-control" type="text" name="Index_Services_t4" value="<?php echo conf_index('Index_Services_t4');?>" placeholder="请输入链接四名称">
              </div>
              <div class="form-group col-xs-6">
                <label for="Index_Services_d4">链接四网址</label>
                <input class="form-control" type="text" name="Index_Services_d4" value="<?php echo conf_index('Index_Services_d4');?>" placeholder="请输入链接四网址">
              </div>
              </div>
              <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>联系方式设置</legend>
</fieldset>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Index_Place">前台显示B站地址</label>
                <input class="form-control" type="text" name="Index_Place" value="<?php echo conf_index('Index_Place');?>" placeholder="请输入要显示的B站地址">
              </div>
              <div class="form-group col-xs-6">
                <label for="Index_Email">前台显示邮箱</label>
                <input class="form-control" type="text" name="Index_Email" value="<?php echo conf_index('Index_Email');?>" placeholder="请输入要显示的邮箱">
              </div>
              </div>
              <div class="row show-grid">
              <div class="form-group col-xs-6">
                <label for="Index_Qq">你的QQ</label>
                <input class="form-control" type="text" name="Index_Qq" value="<?php echo conf_index('Index_Qq');?>" placeholder="请输入要显示的QQ">
              </div>
              <div class="form-group col-xs-6">
                <label for="Index_Phone">前台显示微信图片</label>
                <input class="form-control" type="text" name="Index_Phone" value="<?php echo conf_index('Index_Phone');?>" placeholder="请输入你的微信加好友二维码链接">
              </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>
          </div>
        </div>
<?php
}elseif($mod=='emailset'){
?>
        <div class="tab-content">
          <div class="tab-pane active">
            <form onsubmit="return saveSetting(this)" method="post" name="edit-form" class="edit-form">
              <div class="form-group">
                <label for="Mail_Smtp">好友一名称</label>
                <input class="form-control" type="text" name="Mail_Smtp" value="<?php echo conf('Mail_Smtp');?>" placeholder="请输入好友一的名称" >
              </div>
              <div class="form-group">
                <label for="Mail_Port">好友一QQ</label>
                <input class="form-control" type="text" name="Mail_Port" value="<?php echo conf('Mail_Port');?>" placeholder="请输入好友一的QQ" >
              </div>
              <div class="form-group">
                <label for="Mail_Name">好友二名称</label>
                <input class="form-control" type="text" name="Mail_Name" value="<?php echo conf('Mail_Name');?>" placeholder="请输入好友二名称" >
              </div>
              <div class="form-group">
                <label for="Mail_Pwd">好友二QQ</label>
                <input class="form-control" type="text" name="Mail_Pwd" value="<?php echo conf('Mail_Pwd');?>" placeholder="请输入好友二QQ" >
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>
          </div>
        </div>
<?php
}
?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../assets/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/admin/js/main.min.js"></script>
<script src="../assets/layer/layer.js"></script>
<script>
function checkURL(obj)
{
  var url = $(obj).val();

  if (url.indexOf(" ")>=0){
    url = url.replace(/ /g,"");
  }
  if (url.toLowerCase().indexOf("http://")<0 && url.toLowerCase().indexOf("https://")<0){
    url = "http://"+url;
  }
  if (url.slice(url.length-1)!="/"){
    url = url+"/";
  }
  $(obj).val(url);
}
function saveSetting(obj){
  var ii = layer.load(2, {shade:[0.1,'#fff']});
  $.ajax({
    type : 'POST',
    url : 'ajax.php?act=set',
    data : $(obj).serialize(),
    dataType : 'json',
    success : function(data) {
      layer.close(ii);
      if(data.code == 0){
        layer.alert(data.msg, {
          icon: 1,
          closeBtn: false
        }, function(){
          window.location.reload()
        });
      }else{
        layer.alert(data.msg, {icon: 2})
      }
    },
    error:function(data){
      layer.msg('服务器错误');
      return false;
    }
  });
  return false;
}
function saveSettings(obj){
  var ii = layer.load(2, {shade:[0.1,'#fff']});
  $.ajax({
    type : 'POST',
    url : 'ajax.php?act=sets',
    data : $(obj).serialize(),
    dataType : 'json',
    success : function(data) {
      layer.close(ii);
      if(data.code == 0){
        layer.alert(data.msg, {
          icon: 1,
          closeBtn: false
        }, function(){
          window.location.reload()
        });
      }else{
        layer.alert(data.msg, {icon: 2})
      }
    },
    error:function(data){
      layer.msg('服务器错误');
      return false;
    }
  });
  return false;
}
</script>
</body>
</html>