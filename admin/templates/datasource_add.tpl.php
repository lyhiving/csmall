<?php
defined('IN_WSLM') or exit('Access Denied');
include admin_tpl('header');
?>
<body>
<form name="myform" method="post" action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>">
<table cellpadding="0" cellspacing="1" class="table_form">
  <caption>添加数据源</caption>
  <tr>
    <th width="30%"><strong>数据源名称：</strong><br />只能由字母、数字和下划线组成，且名称不得重复</th>
    <td><input type="text" name="info[name]" id="name" value="" size="20" require="true" datatype="limit|ajax" url="?mod=<?=$mod?>&file=<?=$file?>&action=checkname" min="1" max="20" msg="不得为空且不超过20个字符！|" /></td>
  </tr>
  <tr>
    <th><strong>数据库主机：</strong></th>
    <td><input type="text" name="info[dbhost]" id="dbhost" value="localhost" size="20" require="true" datatype="limit" min="1" max="50" msg="不得为空"/></td>
  </tr>
  <tr>
    <th><strong>数据库帐号：</strong></th>
    <td><input type="text" name="info[dbuser]" id="dbuser" value="" size="15" require="true" datatype="limit" min="1" max="50" msg="不得为空"/></td>
  </tr>
  <tr>
    <th><strong>数据库密码：</strong></th>
    <td><input type="password" name="info[dbpw]" id="dbpw" value="" size="15" /></td>
  </tr>
  <tr>
    <th><strong>数据库名：</strong></th>
    <td><input type="text" name="info[dbname]" id="dbname" value="" size="15" onblur="javascript:get_tables()" require="true" datatype="limit" min="1" max="50" msg="不得为空" /></td>
  </tr>
  <tr>
    <th><strong>数据库字符集：</strong></th>
    <td><?=form::radio(array('gbk'=>'GBK','utf8'=>'UTF8','latin1'=>'latin1'), 'info[dbcharset]', 'dbcharset', CHARSET, 3)?></td>
  </tr>
  <tr>
    <th><strong>数据表：</strong></th>
    <td><span id="div_tables"></span>&nbsp;</td>
  </tr>
  <tr>
    <th><strong>字段：</strong></th>
    <td><span id="div_fields"></span>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="dosubmit" value=" 确定 " /> &nbsp; <input type="button" name="link" value="连接测试" onclick="javascript:dbtest()"/>
	</td>
  </tr>
</table>
</form>
<table cellpadding="0" cellspacing="1" class="table_info">
  <caption>提示信息</caption>
  <tr>
    <td>
	如果需要调用本系统之外的数据库，可以通过数据源管理来保存数据库服务器配置信息，调用的时候通过数据源名称就可以进行调用了。<br />
	本功能主要应用于<a href="?mod=wslm&file=template&action=add">get标签调用远程数据库数据</a>或者<a href="?mod=mail&file=importmail&action=choice">导出远程数据库邮件列表</a>。<br /><br />
	<span style="color:blue">get 标签调用外部数据示例（调用数据源为bbs，分类ID为1的10个最新主题，主题长度不超过25个汉字，显示更新日期）：</span><br />
{get dbsource="bbs" sql="select * from cdb_threads where fid=1 order by dateline desc" rows="10"}<br />
 &nbsp;&nbsp;&nbsp;&nbsp;主题：{str_cut($r[subject], 50)} URL：http://bbs.wslm.cn/viewthread.php?tid={$r[tid]} 更新日期：{date('Y-m-d', $r[dateline])} <br />
{/get}
	</td>
  </tr>
</table>

<script language="javascript" type="text/javascript">
function dbtest()
{
	$.get('?mod=wslm&file=datasource&action=test', {dbhost: $('#dbhost').val(), dbuser: $('#dbuser').val(), dbpw: $('#dbpw').val(), dbname: $('#dbname').val(), dbcharset: $('#dbcharset').val()}, function(data){
		if(data==1) alert('连接成功');
		else if(data==2) alert('连接失败');
		else if(data==3) alert('连接成功，但是数据库不存在');
		else alert(data);
	});
}
function get_tables()
{
	if($('#dbname').val() == ''){ alert('数据库名不得为空！'); return false;}
	$.get('?mod=wslm&file=datasource&action=test', {dbhost: $('#dbhost').val(), dbuser: $('#dbuser').val(), dbpw: $('#dbpw').val(), dbname: $('#dbname').val(), dbcharset: $('#dbcharset').val()}, function(data){
	    if(data == 1) $('#div_tables').load('?mod=wslm&file=datasource&action=tables', {dbhost: $('#dbhost').val(), dbuser: $('#dbuser').val(), dbpw: $('#dbpw').val(), dbname: $('#dbname').val(), dbcharset: $('#dbcharset').val()}); else {$('#div_tables').html('');$('#div_fields').html('');}
	});
}
$(function(){
	$('form').checkForm(1);
});
</script>
</body>
</html>