<?php
require dirname(__FILE__).'/include/common.inc.php';

if(!$_userid) showmessage('您还没有登陆，请登陆', $MODULE['member']['url'].'login.php?forward='.urlencode($forward));
$contentid = $contentid ? intval($contentid) : exit;
require_once 'admin/content.class.php';
$c = new content();
$r = $c->get($contentid);
if(!$r) showmessage('信息不存在');
extract($r);

$C = cache_read('category_'.$catid.'.php');
if(!$readpoint) $readpoint = $C['defaultchargepoint'];

$allow_readpoint = 1;

if($C['defaultchargepoint'] || $r['readpoint'])
{
	$readpoint = $r['readpoint'] ? $r['readpoint'] : $C['defaultchargepoint'];
	$pay = load('pay_api.class.php', 'pay', 'api');
	if($C['repeatchargedays'])
	{
		if($pay->is_exchanged($contentid, $C['repeatchargedays']) === FALSE)
		{
			$allow_readpoint = 0;
		}
		else
		{
			header("Location: ".$WSLM['siteurl'].$url);
			exit;
		}
	}
}

//判断是否支付或者到期
if($_point < $readpoint) showmessage('点数不足,请充值', $MODULE['pay']['url'].'showpayment.php?action=type&pay=card&forward='.urlencode($forward));

$pay_api = load('pay_api.class.php', 'pay', 'api');
$pay_api->update_exchange('wslm', 'point', -$readpoint, '[阅读扣点]ID='.$contentid, '', $contentid.$C['repeatchargedays']);
session_start();
$_SESSION['pay_contentid'] = $contentid;
showmessage('操作成功', $forward);
?>