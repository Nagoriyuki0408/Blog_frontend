<?php
$mod = 'admin';
include('../Common/Core_brain.php');
$member_nums=$DB->getColumn("SELECT count(*) from nteam_team_member WHERE 1");
$leave_nums=$DB->getColumn("SELECT count(*) from nteam_leave_messages WHERE 1");
if ($leave_nums == null) {
  $leave_nums = 0;
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>后台首页 - <?php echo conf('Name');?> - 后台管理中心</title>
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
    <div class="col-sm-6 col-md-3">
      <div class="card bg-info">
        <div class="card-body clearfix">
          <div class="pull-right">
            <p class="h6 text-white m-t-0">实时时间</p>
            <p class="h3 text-white m-b-0" id="clock"></p>
          </div>
          <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-rocket fa-1-5x"></i></span> </div>
        </div>
      </div>
    </div>
<blockquote class="layui-elem-quote" style="margin-top: 10px;">
  <div id="test2"></div>
</blockquote>
      </div>
    </div>
  <div class="row">
    <div class="col-md-6"> 
      <div class="card">
        <div class="card-header">
          <h4>服务器信息</h4>
        </div>
        <div class="card-body">
          <ul class="list-group" style="margin-bottom: 0px;">
            <li class="list-group-item" style="border: 0px solid #ddd;">
              <b>PHP 版本：</b><?php echo phpversion() ?>
              <?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
            </li>
            <li class="list-group-item" style="border: 0px solid #ddd;">
              <b>MySQL 版本：</b><?php echo $mysqlversion[0] ?>
            </li>
            <li class="list-group-item" style="border: 0px solid #ddd;">
              <b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
            </li>
            <li class="list-group-item" style="border: 0px solid #ddd;">
			  <b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
            </li>
            <li class="list-group-item" style="border: 0px solid #ddd;">
              <b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
            </li>
            <li class="list-group-item" style="border: 0px solid #ddd;">
              <b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
            </li>
          </ul>
        </div>
      </div>
    </div>

     
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<div class="card">
<div class="card-header"><h4>轮播图</h4></div>
<div class="card-body">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
</ol>
<div class="carousel-inner">
<div class="item active"><a href="" target="_blank" rel="nofollow">
    <img src="https://www.dmoe.cc/random.php" alt="nanyinet"></a></div>
<a class="left carousel-control" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="icon-left-open-big icon-prev" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
<a class="right carousel-control" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="icon-right-open-big icon-next" aria-hidden="true"></span><span class="sr-only">Next</span></a>

<script type="text/javascript" src="../assets/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/admin/js/main.min.js"></script>
<script>
layui.use(['util', 'laydate', 'layer'], function(){
  var util = layui.util
  ,laydate = layui.laydate
  ,$ = layui.$
  ,layer = layui.layer;
  //固定块
  util.fixbar({
    bar1: true
    ,bar2: true
    ,css: {right: 50, bottom: 100}
    ,bgcolor: '#393D49'
    ,click: function(type){
      if(type === 'bar1'){
        layer.msg('icon 是可以随便换的')
      } else if(type === 'bar2') {
        layer.msg('两个 bar 都可以设定是否开启')
      }
    }
  });
  //倒计时
  var thisTimer, setCountdown = function(y, M, d, H, m, s){
    var endTime = new Date(y, M||0, d||1, H||0, m||0, s||0) //结束日期
    ,serverTime = new Date(); //假设为当前服务器时间，这里采用的是本地时间，实际使用一般是取服务端的
     
    clearTimeout(thisTimer);
    util.countdown(endTime, serverTime, function(date, serverTime, timer){
      var str = date[0] + '天' + date[1] + '时' +  date[2] + '分' + date[3] + '秒';
      lay('#test2').html(str);
      thisTimer = timer;
    });
  };
  setCountdown(2023,1,21);
  laydate.render({
    elem: '#test1'
    ,type: 'datetime'
    ,done: function(value, date){
      setCountdown(date.year, date.month - 1, date.date, date.hours, date.minutes, date.seconds);
    }
  });
<!--图表插件-->
<script type="text/javascript" src="../assets/admin/js/Chart.js"></script>
</body>
</html>