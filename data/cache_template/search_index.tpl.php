<?php defined('IN_WSLM') or exit('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $head['title'];?></title>
<meta content="<?php echo $head['keywords'];?>" name="keywords">
<meta content="<?php echo $head['description'];?>" name="description">
<base href="<?php echo SITE_URL;?>" />
<link href="<?php echo SKIN_PATH;?><?php echo $mod;?>.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="images/js/jquery.min.js"></script>
<script type="text/javascript" src="images/js/css.js"></script>
<script type="text/javascript">
function set_type(type)
{
$('#type').val(type);
q = $('#q').val();
    if(q)
{
    search.submit();
}
else
{
$('#search_form>span').removeClass('selected');
$('#type_'+type).addClass('selected');
}
}
</script>
</head>
<body>
<style>
<!--
body{ background-image:none;}
-->
</style>
<!--end head-->
<div id="search_index">
<form name="search">
<p><img src="images/logo.gif"/></p>
  <ul>
    <li id="search_form">
<span id="type_all" class="selected" onclick="set_type('all')">全部</span>
<?php if(is_array($types)) foreach($types AS $type => $name) { ?>
<span id="type_<?php echo $type;?>" onclick="set_type('<?php echo $type;?>')"><?php echo $name;?></span>
<?php } ?>
</li>
    <li>
      <input type="hidden" name="type" value="all" id="type"/>
      <input type="text" name="q" size="48" id="q"/>
      <input type="submit" name="s" id="button" value="搜索" />
    </li>
<li><strong>热门关键字:</strong><?php $DATA = get("SELECT `tag` FROM wslm_keyword ORDER BY hits DESC", 6, 0, "", "");foreach($DATA AS $n => $r) { $n++;?><a href="javascript:$('#q').val('<?php echo $r['tag'];?>');void(0);"><?php echo $r['tag'];?></a> <?php } unset($DATA); ?></li>
  </ul>
</form>
</div>
<?php include template('wslm','footer'); ?> 