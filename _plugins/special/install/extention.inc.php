<?php
defined('IN_WSLM') or exit('Access Denied');
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(5, '专题', '', '', '', '_self', '', '', '', '', 1, 0, 0, 0, 'special');");
$parentid = $db->insert_id();
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '添加专题', '', '?mod=special&file=special&action=add', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '管理专题', '', '?mod=special&file=special&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '添加分类', '', '?mod=special&file=type&action=add', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '管理分类', '', '?mod=special&file=type&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '模块配置', '', '?mod=special&file=setting', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '权限设置', '', '?mod=special&file=priv', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(7, '专题', '', '', '', '_self', '', '', '', '', 1, 0, 0, 0, 'ask');");
$parentid = $db->insert_id();
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '新建模板', '', '?mod=wslm&file=template&action=add&module=special', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '管理模板', '', '?mod=wslm&file=template&action=manage&module=special', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '添加标签', '', '?mod=special&file=tag&action=add', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '管理标签', '', '?mod=special&file=tag&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'special');");

?>