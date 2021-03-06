<?php 
defined('IN_WSLM') or exit('Access Denied');
include admin_tpl('header');
?>
<body onLoad="is_ie();$('#setting').load('?mod=<?=$mod?>&file=<?=$file?>&action=setting_add&formid=<?=$formid?>&formtype='+myform.formtype.value);">
<form action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>&formid=<?=$formid?>" method="post" name="myform">
<table cellpadding="0" cellspacing="1" class="table_form">
  <caption>表单<?=$FORMGUIDE[$formid][name]?>——添加字段</caption>
	<tr> 
      <th width="30%">
      <strong>字段名</strong><br />
	  只能由英文字母、数字和下划线组成，并且仅能字母开头，不以下划线结尾
	  </th>
      <td><input name="info[field]" id="field" size="20" require="true" datatype="limit|ajax" min="1" max="20" url="?mod=<?=$mod?>&file=<?=$file?>&action=checkfield&formid=<?=$formid?>" msg="字符须为1到10位|">
	  <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>字段别名</strong><br />例如：文章标题</th>
      <td>
	  <input type="text" name="info[name]" size="30" require="true" datatype="limit|ajax" min="3" max="20" url="?mod=<?=$mod?>&file=<?=$file?>&action=checkname&formid=<?=$formid?>" msg="字符须为3到10位|">
	  <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>字段提示</strong><br />显示在字段别名下方作为表单输入提示</th>
      <td><?=form::textarea('info[tips]', 'tips', '', '2', '20', '', "style=height:60px;width:250px;")?></td>
    </tr>
	<tr> 
      <th><strong>字段类型</strong><br /></th>
      <td>
	  <select name="info[formtype]" id="formtype" onChange="javascript:$('#setting').load('?mod=<?=$mod?>&file=<?=$file?>&action=setting_add&formid=<?=$formid?>&formtype='+this.value);">
<?php 
foreach($fields as $type=>$name)
{
	  echo "<option value=\"$type\">$name</option>\n";
} 
?>
	  </select>
	  </td>
    </tr>
	<tr> 
      <th><strong>相关参数</strong><br />设置表单相关属性</th>
      <td><div id="setting"></div></td>
    </tr>
	<tr> 
      <th><strong>表单附加属性</strong><br />可以通过此处加入javascript事件</th>
      <td><?=form::text('info[formattribute]', 'formattribute', '', 'text', 50)?></td>
    </tr>
	<tr> 
      <th><strong>表单样式名</strong><br />定义表单的CSS样式名</th>
      <td><?=form::text('info[css]', 'css', '', 'text', 10)?></td>
    </tr>
	<tr> 
      <th><strong>字符长度取值范围</strong><br />系统将在表单提交时检测数据长度范围是否符合要求，如果不想限制长度请留空</th>
      <td>最小值：<?=form::text('info[minlength]', 'minlength', 0, 'text', 5)?> 最大值：<?=form::text('info[maxlength]', 'maxlength', '', 'text', 5)?></td>
    </tr>
	<tr> 
      <th><strong>数据校验正则</strong><br />系统将通过此正则校验表单提交的数据合法性，如果不想校验数据请留空</th>
      <td><input type="text" name="info[pattern]" id="pattern" value="<?=$pattern?>" size="40"> 
<select name="pattern_select" onChange="javascript:$('#pattern').val(this.value)">
<option value="">常用正则</option>
<?php 
foreach($patterns as $p)
{
	echo "<option value=\"{$p[pattern]}\">{$p[name]}</option>\n";
}
?>
</select>
	  </td>
    </tr>
	<tr> 
      <th><strong>数据校验未通过的提示信息</strong><br />当表单数据不满足正在校验时的系统提示信息</th>
      <td><?=form::text('info[errortips]', 'errortips', $errortips, 'text', 50)?></td>
    </tr>
	<tr>
      <th><strong>是否必填</strong></th>
      <td><input type="radio" name="info[issystem]" value="1"> 是 <input type="radio" name="info[issystem]" value="0" checked> 否</td>
    </tr>
	<tr>
    	<th><strong>是否出现在后台列表</strong></th>
        <td><input type="radio" name="info[isbackground]" value="1" <?=($isbackground) ? 'checked' : ''?> > 是 <input type="radio" name="info[isbackground]" value="0" checked> 否</td>
    </tr>
	<tr> 
      <th><strong>作为搜索条件</strong></th>
      <td><input type="radio" name="info[issearch]" value="1" > 是 <input type="radio" name="info[issearch]" value="0" checked> 否</td>
    </tr>
	<tr> 
      <th><strong>禁止设置字段值的会员组</strong></th>
      <td><?=$unsetgroups?></td>
    </tr>
	<tr>
	  <td></td>
	  <td>
		<input type="hidden" name="forward" value="?mod=<?=$mod?>&file=<?=$file?>&action=manage&formid=<?=$formid?>"> 
		<input type="submit" name="dosubmit" value=" 确定 "> 
      &nbsp; <input type="reset" name="reset" value=" 清除 ">
	  </td>
	</tr>
    </table>
	</form>
</body>
</html>
<script LANGUAGE="javascript">
<!--
$().ready(function() {
	  $('form').checkForm(1);
	});
//-->
</script>