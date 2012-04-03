<?php defined('IN_WSLM') or exit('Access Denied'); ?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="no-cache">  
<title>提示信息</title>
<style type="text/css">
<!--
* {
margin:0;
padding:0;
}
body {
text-align:center;font-family:Arial, Helvetica, sans-serif,"宋体";
}
p {
font-size: 12px;
line-height:150%;
margin:5px;
background-color:#fff;
padding:8px;
}
h1 {
height:16px;
line-height:16px;
font-size:12px;
text-align:center;
background-color:#E4F3FC;
color:#1589C8;
padding-top:5px;
}
.box_border {
margin:0 auto;
margin-top:80px;
border:1px solid #B9DFF9;
width:450px;
background-color:#E4F3FC;
}
a:link {
color: #0000FF;
text-decoration: none;
}
a:visited {
text-decoration: none;
color: #003399;
}
a:hover {
text-decoration: underline;
color: #0066FF;
}
a:active {
text-decoration: none;
color: #0066FF;
}
-->
</style>

<script language="JavaScript" src="<?php echo WLSL_PATH;?>data/config.js"></script>
<script type="text/javaScript" src="<?php echo WLSL_PATH;?>images/js/jquery.min.js"></script>
<script language="JavaScript" src="<?php echo WLSL_PATH;?>images/js/common.js"></script>
</head>
<body>
<div class="box_border">
  <h1>提示信息</h1>
  <p> <?php echo $msg;?> <br/>
<?php if($url_forward=='goback' || $url_forward=='') { ?>
<a href="javascript:history.back();" >[点这里返回上一页]</a><?php } elseif ($url_forward=="close") { ?>
<input type="button" name="close" value=" 关闭 " onClick="window.close();">
<?php } elseif ($url_forward) { ?>
<a href="<?php echo url($url_forward, 1);?>">如果您的浏览器没有自动跳转，请点击这里</a>
<script language="javascript">setTimeout("redirect('<?php echo url($url_forward, 1);?>');",<?php echo $ms;?>);</script>   
<?php } ?>
<?php if(debug()) { ?>
<br />Processed in <?php echo DEBUG_TIME;?> second(s), <?php echo DEBUG_QUERIES;?> queries.
<?php } ?>
</div>
</body>
</html>