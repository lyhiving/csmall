<?php 
require './include/common.inc.php';

$head['keywords'] = $LANG['credit_list'];
$head['description'] = $head['title'] = $LANG['credit_list'].' - '.$WSLM['sitename'];
include template('ask', 'credit_list');
?>