<?php 
defined('IN_WSLM') or exit('Access Denied');
include admin_tpl('header');
?>
<body>
<form action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>" method="post" name="myform">
<input type="hidden" name="forward" value="?file=block&action=update&blockid=<?=$blockid?>&forward=<?=urlencode($forward)?>"> 
<input type="hidden" name="blockid" value="<?=$blockid?>"> 
<table cellpadding="0" cellspacing="1" class="table_form">
    <caption>修改碎片</caption>
	<tr>
      <th width="30%"><font color="red">*</font> <strong>碎片名称</strong></th>
      <td><input type="text" name="info[name]" size="50" value="<?=$name?>"></td>
    </tr>
	<tr> 
      <th><font color="red">*</font> <strong>网页标识</strong><br />调用碎片页面的网页标识（pageid）</th>
      <td><input type="text" name="info[pageid]" id="pageid" size="20" value="<?=$pageid?>" maxlength="20" require="true" datatype="limit" min="1" max="20" msg="网页标识不得少于1个字符超过20个字符！"></td>
    </tr>
	<tr> 
      <th><font color="red">*</font> <strong>序号</strong><br />调用碎片页面的碎片序号（blockNo）</th>
      <td>
	  <select name="info[blockno]">
<?php 
for($n=1; $n<100; $n++)
{
	echo '<option value="'.$n.'" '.($n == $blockno ? 'selected' : '').'>'.$n.'</option>';
} 
?>
	  </select>
	  </td>
    </tr>
	<tr> 
      <th><font color="red">*</font> <strong>排序权值</strong><br /> 值越小排序越靠前</th>
      <td><input type="text" name="info[listorder]" id="listorder" size="5" value="<?=$listorder?>"></td>
    </tr>
	<tr> 
      <th><font color="red">*</font> <strong>数据格式</strong></th>
      <td>
	  <input type="radio" name="info[isarray]" id="isarray" value="1" <?=$isarray ? 'checked' : ''?> onclick="$('#data_rows').show();"> 格式化（输入标题、缩略图、简介、日期、链接）<br/>
	  <input type="radio" name="info[isarray]" id="isarray" value="0" <?=$isarray ? '' : 'checked'?> onclick="$('#data_rows').hide();"> 非格式化（输入html代码）
	  </td>
    </tr>
	<tbody id="data_rows" style="display: <?=$isarray ? '' : 'none'?>">
	<tr> 
      <th><font color="red">*</font> <strong>数据行数</strong></th>
      <td><input type="text" name="info[rows]" id="rows" size="5" value="<?=$rows?>"> 行</td>
    </tr>
	</tbody>
	<tr> 
      <th><strong>碎片更新权限</strong></th>
      <td><?=form::checkbox($ROLE, 'roleids', 'roleids', $roleids, 5);?></td>
    </tr>
    <tr> 
      <td></td>
      <td>
	  <input type="submit" name="dosubmit" value=" 下一步 "> 
      &nbsp; <input type="reset" name="reset" value=" 清除 ">
	  </td>
    </tr>
</table>
</form>
<script type="text/javascript">
$().ready(function(){
	$('form').checkForm(1);
});
</script>
</body>
</html>