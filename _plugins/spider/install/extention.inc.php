<?php
defined('IN_WSLM') or exit('Access Denied');
$db->query("INSERT INTO `" . DB_PRE . "menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(5, '采集管理', '', '', '', '_self', '', '', '', '', 1, 0, 0, 0, 'spider');");
$parentid = $db->insert_id();
$db->query("INSERT INTO `" . DB_PRE . "menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(" . $parentid . ", '采集站点管理', '', '?mod=spider&file=sitemgr&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'spider');");
$db->query("INSERT INTO `" . DB_PRE . "menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(" . $parentid . ", '采集任务管理', '', '?mod=spider&file=jobmgr&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'spider');");
$db->query("INSERT INTO `" . DB_PRE . "menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(" . $parentid . ", '采集内容管理', '', '?mod=spider&file=collect&action=manage', '', 'right', '', '', '', '', 0, 0, 0, 0, 'spider');");
$db->query("INSERT INTO `" . DB_PRE . "menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(" . $parentid . ", '模块配置', '', '?mod=spider&file=setting', '', 'right', '', '', '', '', 0, 0, 0, 0, 'spider');");
$db->query("INSERT INTO `" . DB_PRE . "menu` (`parentid`, `name`, `image`, `url`, `description`, `target`, `style`, `js`, `groupids`, `roleids`, `isfolder`, `isopen`, `listorder`, `userid`, `keyid`) VALUES(" . $parentid . ", '权限配置', '', '?mod=spider&file=priv', '', 'right', '', '', '', '', 0, 0, 0, 0, 'spider');");
dir_copy(WSLM_ROOT . $installdir . '/install/languages/', WSLM_ROOT . 'languages/' . LANG . '/');
?>