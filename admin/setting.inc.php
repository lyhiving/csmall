<?php
defined('IN_WSLM') or exit('Access Denied');

@set_time_limit(0);

function fileext_select($name, $fileext = 'html' , $property = '', $fileextarr = array('html','htm','shtml','shtm','php'))
{
	$data = '';
	foreach($fileextarr as $ext)
	{
		$data .= "<option value='$ext' ".($ext == $fileext ? 'selected' : '').">$ext</option>\n";
	}
	return "<select name='$name' id='fileext' $property>\n$data</select>\n";
}

switch($action)
{
	case 'save':
		if(empty($setting)) showmessage('操作失败', '?mod=wslm&file=setting');
	    if($setting['siteurl'] && substr($setting['siteurl'], -1, 1) != '/')
	    {
			$setting['siteurl'] .= '/';
		}
		elseif(empty($setting['siteurl']))
	    {
			$setting['siteurl'] = SITE_URL;
		}
		/**
		 *	发送Ku6联盟帐号去验证
		 **/
		if($setting['enableku6'])
		{
			$http = load('http.class.php');
			$arrpost['username'] = $setting['general_username'];
			$arrpost['s_key'] = $setting['general_skey'];
			$arrpost['messageURL'] = $setting['general_url'] ? $setting['general_url'].'api/ku6video.php' : SITE_URL.'api/ku6video.php';
			$http->post(KU6_UNION.'vip/wslminterface.php', $arrpost);
			if($http->get_data() != 200)
			{
				showmessage('Ku6联盟帐号不正确，请重新填写');		
			}
		}
		if($setting['uc'] && DB_PCONNECT) $setconfig['DB_PCONNECT'] = 0;
		filter_write($setting['filter_word']);
		module_setting($mod, $setting);
		set_config($setconfig);
		wslm_tm();
		
		if($WSLM['fileext'] != $setting['fileext'] || $WSLM['enable_urlencode'] != $setting['enable_urlencode'])
	    {
			showmessage('网站配置保存成功！开始更新内容页URL ...', '?mod=wslm&file=url&forward='.urlencode(URL));
		}
		else
	    {
			showmessage($LANG['save_setting_success'], $forward);
		}
		break;

	case 'test_user':
		$http = load('http.class.php');
	    $is_ok = $http->get('http://www.wslm.cn/member/api/test_user.php?charset='.CHARSET.'&wslm_username='.urlencode($wslm_username).'&wslm_password='.urlencode($wslm_password));
		echo $is_ok === false ? 0 : $http->get_data();
		break;

	case 'test_mail':
		require_once 'sendmail.class.php';
        $sendmail = new sendmail();
        $sendmail->set($mail_server, $mail_port, $mail_user, $mail_password, $mail_type, $mail_user);
        echo $sendmail->send($email_to, '邮件发送测试 - '.$WSLM['sitename'], '邮件发送测试！<br />'.$WSLM['mail_sign'], $mail_user) ? '邮件发送成功！' : $sendmail->error[0][1];
		exit;
		break;

    case 'test_uc':
        $link = mysql_connect($uc_dbhost, $uc_dbuser, $uc_dbpwd, 1)  or exit($LANG['can_not_connect_mysql_server']. mysql_error());
        @mysql_select_db($uc_dbname, $link) or exit($uc_dbname.$LANG['can_note_find_database']);
        @mysql_fetch_array(mysql_query("show tables like '{$uc_dbpre}members'")) or exit($LANG['invalid_tablepre'].$uc_dbpre);
        $db->select_db(DB_NAME);
        exit('success');
        break;

	case 'test_ftp':
		require_once 'ftp.class.php';
		$ftp = new ftp($ftp_host, $ftp_port, $ftp_user, $ftp_pw, $ftp_path);
		$message = $ftp->error ? $ftp->errormsg() : 'FTP 连接成功';
		exit($message);
		break;

	case 'ftpdir_list':
		require_once 'ftp.class.php';
		$ftp = new ftp($ftp_host, $ftp_port, $ftp_user, $ftp_pw, '');
		if($ftp->error)
	    {
			exit($ftp->error);
		}
		else
	    {
			$dirs = $ftp->nlist($path);
			if($dirs)
			{
				$options = $path == '/' ? array('/'=>'/') : array(''=>'请选择');
				foreach($dirs as $k=>$v)
				{
					if(!str_exists($v, '.')) $options[$v] = $v;
				}
				if(count($options) > 1)
				{
					echo form::select($options, 'dirlist', 'dirlist', '', 1, '', 'onchange="$(\'#ftp_path\').val(this.value == \'/\' ? \'/\' : \''.$path.'\'+this.value+\'/\');ftpdir_list(\''.$path.'\'+this.value+\'/\')"');
				}
			}
		}
		break;

	default :
		@extract(new_htmlspecialchars($WSLM));

		if(!function_exists('ob_gzhandler')) $enablegzip = 0;
		$safe_mode = ini_get('safe_mode');

		if(!function_exists('imagepng') && !function_exists('imagejpeg') && !function_exists('imagegif'))
	    {
			$gd = "<font color='red'>".$LANG['no_gd_support']."</font>";
			$enablegd = 0;
		}
		else
	    {
			$gd = $LANG['support'];
			$enablegd = 1;
		}
        if(function_exists('imagepng')) $gd .= "PNG ";
        if(function_exists('imagejpeg')) $gd .= " JPG ";
        if(function_exists('imagegif')) $gd .= " GIF ";
        include admin_tpl('setting');
}
?>