<?php
defined('IN_WSLM') or exit('Access Denied');
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(5, '短消息', '', '', '', '_self', '', '', '', '', 1, 0, 0, 0, 'message');");
$parentid = $db->insert_id();
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '群发短消息', '', '?mod=message&file=sendmessage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '短消息管理', '', '?mod=message&file=manage&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '删除短消息', '', '?mod=message&file=manage&action=delete', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '权限设置', '', '?mod=message&file=priv', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");

$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$member_0.", '短消息', '', 'message/index.php', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(7, '短消息', '', '', '', '_self', '', '', '', '', 1, 0, 0, 0, 'message');");
$parentid = $db->insert_id();
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '新建模板', '', '?mod=wslm&file=template&action=add&module=message', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");
$db->query("INSERT INTO `".DB_PRE."menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(".$parentid.", '管理模板', '', '?mod=wslm&file=template&action=manage&module=message', '', 'right', '', '', '', '', 0, 0, 0, 0, 'message');");
?>