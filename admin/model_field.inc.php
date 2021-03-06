<?php 
defined('IN_WSLM') or exit('Access Denied');
@set_time_limit(600);
require_once 'fields/fields.inc.php';
require_once 'admin/model_field.class.php';
require_once 'admin/model.class.php';
$field = new model_field($modelid);
$model = new model();
$modelinfo = $model->get($modelid);
$modelname = $modelinfo['name'];
$tablename = $field->tablename;

$submenu = array(
	array('添加字段', '?mod='.$mod.'&file='.$file.'&action=add&modelid='.$modelid),
	array('管理字段', '?mod='.$mod.'&file='.$file.'&action=manage&modelid='.$modelid),
	array('预览模型', '?mod='.$mod.'&file='.$file.'&action=preview&modelid='.$modelid),
);
$menu = admin_menu($modelname.'模型字段管理', $submenu);

if(!$action) $action = 'manage';

switch($action)
{
    case 'add':
		if($dosubmit)
		{
			$info['modelid'] = $modelid;
            $info['unsetgroupids'] = isset($unsetgroupids) ? implodeids($unsetgroupids) : '';
            $info['unsetroleids'] = isset($unsetroleids) ? implodeids($unsetroleids) : '';
			$result = $field->add($info, $setting);
			if($result)
			{
				extract($setting);
				extract($info);
				require_once 'fields/'.$formtype.'/field_add.inc.php';

				/*如果字段作为搜索条件，增加索引*/
				if($issearch) {
					$sql = "SHOW INDEX FROM `$tablename`";
					$query = $db->query($sql);
					while($res = $db->fetch_array($query)) {
						$indexarr[] = $res['Column_name'];
					}
					if(is_array($indexarr) && !in_array($field, $indexarr)) {
						$sql = "ALTER TABLE `$tablename` ADD INDEX `$field` (`$field`)";
						$db->query($sql);
					}
				}

				showmessage('操作成功！', $forward);
			}
			else
			{
				showmessage('操作失败！');
			}
		}
		else
		{
			if(!is_ie()) showmessage('本功能只支持IE浏览器，请用IE浏览器打开。');
			$unsetgroups = form::checkbox($GROUP, 'unsetgroupids', 'unsetgroupids', '', 4);
			$unsetroles = form::checkbox($ROLE, 'unsetroleids', 'unsetroleids', '', 4);
		    require_once 'fields/patterns.inc.php';
			include admin_tpl('model_field_add');
		}
		break;
    case 'edit':
		if($dosubmit)
		{
            $info['unsetgroupids'] = isset($unsetgroupids) ? implodeids($unsetgroupids) : '';
            $info['unsetroleids'] = isset($unsetroleids) ? implodeids($unsetroleids) : '';
			$result = $field->edit($fieldid, $info, $setting);
			if($result)
			{
				extract($setting);
				extract($info);
				if($issystem) $tablename = DB_PRE.'content';
				require_once 'fields/'.$formtype.'/field_edit.inc.php';

				/*非系统且作为搜索条件字段，增加索引*/
				if(!$issystem) {
					$sql = "SHOW INDEX FROM `$tablename`";
					$query = $db->query($sql);
					while($res = $db->fetch_array($query)) {
						$indexarr[] = $res['Column_name'];
					}
					if(is_array($indexarr) && in_array($field, $indexarr)) {
						if(!$issearch) {
							$sql = "ALTER TABLE `$tablename` DROP INDEX `$field`";
							$db->query($sql);
						}
					} else {
						if($issearch) {
							$sql = "ALTER TABLE `$tablename` ADD INDEX `$field` (`$field`)";
							$db->query($sql);
						}
					}
				}

				showmessage('操作成功！', $forward);
			}
			else
			{
				showmessage('操作失败！');
			}
		}
		else
		{
			if(!is_ie()) showmessage('本功能只支持IE浏览器，请用IE浏览器打开。');
			$info = $field->get($fieldid);
			if(!$info) showmessage('指定的字段不存在！');
			extract(new_htmlspecialchars($info));
			$unsetgroups = form::checkbox($GROUP, 'unsetgroupids', 'unsetgroupids', $unsetgroupids, 4);
			$unsetroles = form::checkbox($ROLE, 'unsetroleids', 'unsetroleids', $unsetroleids, 4);
		    require_once 'fields/patterns.inc.php';
			include admin_tpl('model_field_edit');
		}
		break;
	case 'copy':
		if($dosubmit)
		{
      		$info['modelid'] = $modelid;
			$info['formtype'] = $formtype;
            $info['unsetgroupids'] = isset($unsetgroupids) ? implodeids($unsetgroupids) : '';
            $info['unsetroleids'] = isset($unsetroleids) ? implodeids($unsetroleids) : '';
			$result = $field->add($info, $setting);
			if($result)
			{
				extract($setting);
				extract($info);
				require_once 'fields/'.$formtype.'/field_add.inc.php';
				showmessage('操作成功！', $forward);
			}
			else
			{
				showmessage('操作失败！');
			}
		}
		else
		{
			$info = $field->get($fieldid);
			if(!$info) showmessage('指定的字段不存在！');
			extract(new_htmlspecialchars($info));
			$unsetgroups = form::checkbox($GROUP, 'unsetgroupids', 'unsetgroupids', $unsetgroupids, 5);
			$unsetroles = form::checkbox($ROLE, 'unsetroleids', 'unsetroleids', $unsetroleids, 5);
		    require_once 'fields/patterns.inc.php';
			include admin_tpl('model_field_copy');
		}
		break;
    case 'manage':
        $infos = $field->listinfo("modelid=$modelid", 'listorder,fieldid', 1, 100);
		include admin_tpl('model_field_manage');
		break;
    case 'delete':
		$info = $field->get($fieldid);
		$result = $field->delete($fieldid);
		if($result)
		{
			extract($info);
			@extract(unserialize($setting));
			require_once 'fields/'.$formtype.'/field_delete.inc.php';
			showmessage('操作成功！', '?mod=wslm&file=model_field&action=manage&modelid='.$modelid);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
    case 'listorder':
		$result = $field->listorder($info);
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
    case 'disable':
		$result = $field->disable($fieldid, $disabled);
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
    case 'setting_add':
		require_once 'fields/patterns.inc.php';
        require_once 'fields/'.$formtype.'/field_add_form.inc.php';
		break;
    case 'setting_edit':
		$info = $field->get($fieldid);
		if(!$info) showmessage('指定的字段不存在！');
		eval("\$setting = $info[setting];");
		@extract($setting);
		require_once 'fields/patterns.inc.php';
        require_once 'fields/'.$formtype.'/field_edit_form.inc.php';
		break;
    case 'preview':
		if($dosubmit)
		{
			require CACHE_MODEL_PATH.'content_input.class.php';
			require CACHE_MODEL_PATH.'content_update.class.php';

			$content_input = new content_input($modelid);
			$info = $content_input->get($info);
            $systeminfo = $info['system'];
            $modelinfo = $info['model'];

			$systeminfo['userid'] = $_userid;
			$systeminfo['updatetime'] = TIME;

			$db->insert(DB_PRE.'content', $systeminfo);
			$contentid = $modelinfo['contentid'] = $db->insert_id();
			$db->insert($tablename, $modelinfo);
            
			$content_update = new content_update($modelid, $contentid);
			$content_update->update($info);

			showmessage(' 发布成功！');
		}
		else
		{
			require CACHE_MODEL_PATH.'content_form.class.php';
			$content_form = new content_form($modelid);
			$forminfos = $content_form->get();
			include admin_tpl('content_add');
		}
		break;
	case 'checkfield':
		if(!$field->check($value))
		{
			exit('只能由英文字母、数字和下划线组成，必须以字母开头');
		}
		elseif($field->exists($value))
		{
			exit('字段名已存在');
		}
		else
		{
			exit('success');
		}
	break;
}
?>