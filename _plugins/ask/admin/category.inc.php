<?php
defined('IN_WSLM') or exit('Access Denied');
require_once 'tree.class.php';
require_once 'admin/category.class.php';

$tree = new tree;
$catid = isset($catid) ? intval($catid) : 0;
$cat = new category($mod);

$submenu = array
(
	array($LANG['add_category'], '?mod='.$mod.'&file='.$file.'&action=add'),
	array('管理栏目', '?mod='.$mod.'&file='.$file.'&action=manage'),
	array($LANG['join_category'], '?mod='.$mod.'&file='.$file.'&action=join'),
	array($LANG['update_category_cache'], '?mod='.$mod.'&file='.$file.'&action=updatecache'),
	array($LANG['category_data_repair'], '?mod='.$mod.'&file='.$file.'&action=repair')
);
$menu = admin_menu('管理栏目', $submenu);

$action = $action ? $action : 'manage';

switch($action)
{
	case 'add':

		if($dosubmit)
		{
		    if(!$category['catname']) showmessage($LANG['category_name_not_null']);

			$catid = $cat->add($category, $setting);
			$priv_group->update('catid', $catid, $priv_groupid);
			$priv_role->update('catid', $catid, $priv_roleid);
			cache_common();
	        showmessage($LANG['operation_success'], '?mod='.$mod.'&file='.$file.'&action=updatecache&catid='.$catid.'&forward='.urlencode($forward));
		}
		else
	    {
			$groups = cache_read('member_group.php');
		    include admin_tpl('category_add');
		}
		break;

	case 'edit':
		$catid = intval($catid);
		if(!$catid) showmessage($LANG['illegal_parameters']);
		if($catid == $category['parentid']) showmessage('当前栏目不能与上级栏目相同');
		if($dosubmit)
		{
		    if(!$category['catname']) showmessage($LANG['category_name_not_null']);
			if($M['rewrite'])
			{
				$category['url'] = $M['url']."list.php?catid=$catid";
			}
			else
			{
				$category['url'] = $M['url']."list.php?catid=$catid";
			}
			$cat->edit($catid, $category, $setting);
			$priv_group->update('catid', $catid, $priv_groupid);
			$priv_role->update('catid', $catid, $priv_roleid);

			showmessage($LANG['operation_success'], '?mod='.$mod.'&file='.$file.'&action=updatecache');
		}
		else
	    {
			$category = $cat->get($catid);
            @extract(new_htmlspecialchars($category));
			$groups = cache_read('member_group.php');
		    include admin_tpl('category_edit');
		}
		break;

     case 'repair':

        $cat->repair();
        showmessage($LANG['operation_success'], $forward);
		break;

     case 'delete':
		 if(!array_key_exists($catid, $CATEGORY)) showmessage($LANG['illegal_parameters'], '?mod=wslm&file=category&action=manage');
		 $cat->delete($catid);
		 $forward = "?mod=$mod&file=$file&action=manage";
		 showmessage($LANG['operation_success'], '?mod='.$mod.'&file='.$file.'&action=updatecache&forward='.urlencode($forward));
		 break;

	case 'join':

	    if($dosubmit)
		{
		   $targetcatid = intval($targetcatid);
		   $sourcecatid = intval($sourcecatid);
           if(!$targetcatid || !$sourcecatid) showmessage($LANG['please_choose_catid'], $forward);
		   if($targetcatid==$sourcecatid) showmessage($LANG['source_not_same_as_distinct_category'],$forward);

           $target = $cat->get($targetcatid);
           if($target['child']==1 && $target['enableadd']==0) showmessage($LANG['distinct_category_has_child_banned_add_information']);

           if($target['arrparentid'])
		   {
              $arrparentid = explode(",", $r['arrparentid']);
              if(in_array($sourcecatid,$arrparentid)) showmessage($LANG['distinct_is_the_child_of_source_category_cannot_join']);
           }

           $source = $cat->get($sourcecatid);

           $cat->join($sourcecatid, $targetcatid);

		   showmessage($LANG['operation_success'], $forward);
		}
		else
		{
			include admin_tpl('category_join');
		}
		break;

    case 'listorder':
		$cat->listorder($listorder);
		showmessage($LANG['operation_success'], $forward);
        break;

	case 'updatecache':
		require_once MOD_ROOT.'include/global.func.php';
		foreach($CATEGORY AS $k=>$c)
		{
			$catid = $c['catid'];
			$url = caturl('all');
			$r = $db->get_one("SELECT count(askid) AS num FROM ".DB_PRE."ask WHERE catid=$catid");
			$db->query("UPDATE ".DB_PRE."category SET items=$r[num],url='$url' WHERE catid=$catid");
		}
		cache_common();
		cache_category();
		showmessage($LANG['category_cache_update_success'], '?mod=ask&file=category&action=manage');
		break;

	case 'manage':
		$list = $cat->listinfo();
		if(is_array($list))
	    {
			$categorys = array();
			foreach($list as $catid => $category)
			{
				 $url = url($category['url']);
				 $catdir = $category['type'] ? "<a href='$url' title='".$LANG['click_view']."' target='_blank'>".str_cut($url,20)."</a>" : "<a href='$url' title='".$LANG['click_view']."' target='_blank'>".$category['catdir']."</a>";
				 $model = $MODEL[$category['modelid']]['name'];
				 $add_child_cat = $category['islink'] ? '<font color="#CCCCCC">'.$LANG['add_child_category'].'</font>' : "<a href='?mod=$mod&file=$file&action=add&catid=$catid'>".$LANG['add_child_category']."</a>";
				 $categorys[$category['catid']] = array('id'=>$category['catid'],'parentid'=>$category['parentid'],'name'=>$category['catname'],'type'=>$type,'catdir'=>$catdir,'listorder'=>$category['listorder'],'model'=>$model,'style'=>$category['style'],'mod'=>$mod,'file'=>$file,'add_child_cat'=>$add_child_cat,'clear_cat'=>$clear_cat);
			}
			$str = "<tr>
						<td style='text-align:center'><input name='listorder[\$id]' type='text' size='3' value='\$listorder'></td>
						<td style='text-align:center'>\$id</td>
						<td style='text-align:left'>\$spacer<a href='?mod=\$mod&file=\$file&action=edit&catid=\$id&parentid=\$parentid'><span class='\$style'>\$name</span></a></td>
						<td style='text-align:center'>\$catdir</td>
						<td style='text-align:center'>\$add_child_cat | <a href='?mod=\$mod&file=\$file&action=edit&catid=\$id&parentid=\$parentid'>".$LANG['edit']."</a> | <a href=javascript:confirmurl('?mod=\$mod&file=\$file&action=delete&catid=\$id','".$LANG['confirm_delete_category']."')>".$LANG['delete']."</a></td>
					</tr>";
			$tree->tree($categorys);
			$categorys = $tree->get_tree(0,$str);
		}
		include admin_tpl('category');
		break;

	case 'checkname':
		foreach($CATEGORY AS $k=>$v)
		{
			if($v['parentid'] != $parentid) continue;
			if($v['catname'] == trim($value)) exit('栏目名称不能重复');
		}
		exit('success');
		break;
}
?>