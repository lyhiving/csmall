<?php 
defined('IN_WSLM') or exit('Access Denied');
include admin_tpl('header');
?>
<body>
<table cellpadding="2" cellspacing="1" class="table_list">
    <caption>内容模型管理</caption>
<tr>
<th width="10%">名称</th>
<th>描述</th>
<th width="15%">数据表</th>
<th width="8%">数据量</th>
<th width="8%">生成html</th>
<th width="35%">管理操作</th>
</tr>
<?php 
if(is_array($infos)){
	foreach($infos as $info){
?>
<tr>
<td class="align_c"><?=$info['name']?></td>
<td><?=$info['description']?></td>
<td class="align_l"><a href="?mod=<?=$mod?>&file=model_field&action=manage&modelid=<?=$info['modelid']?>"><?=DB_PRE.'c_'.$info['tablename']?></a></td>
<td class="align_c"><?=$model->rows(DB_PRE.'c_'.$info['tablename'])?></td>
<td class="align_c"><?=($info['ishtml'] ? '<font color="red">是</font>' : '否')?></td>
<td class="align_c">
<a href="?mod=<?=$mod?>&file=model_field&action=manage&modelid=<?=$info['modelid']?>">字段管理</a> | 
<a href="?mod=<?=$mod?>&file=<?=$file?>&action=edit&modelid=<?=$info['modelid']?>">修改</a> | 
<a href="?mod=<?=$mod?>&file=<?=$file?>&action=disable&modelid=<?=$info['modelid']?>&disabled=<?=($info['disabled']==1 ? 0 : 1)?>"><?=($info['disabled']==1 ? '<font color="red">启用</font>' : '禁用')?></a> | 
<a href=javascript:confirmurl("?mod=<?=$mod?>&file=<?=$file?>&action=delete&modelid=<?=$info['modelid']?>","确认要删除‘<?=str_replace(' ','&nbsp;',$info['name'])?>’模型吗？")>删除</a> | 
<a href="?mod=<?=$mod?>&file=<?=$file?>&action=export&modelid=<?=$info['modelid']?>">导出为模板</a>
</td>
</tr>
<?php 
	}
}
?>
</table>
<div id="pages"><?=$model->pages?></div>
</body>
</html>