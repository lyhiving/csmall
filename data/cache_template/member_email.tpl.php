<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div id="main">
<form name="emailform" action="<?php echo $M['url'];?>email.php" method="post">
<table cellpadding="0" cellspacing="0" class="table_form">
    	<tr>
        	<caption>重新发送激活邮件</caption>
        </tr>
        <tr>
        	<th width="12%">用户名：</th>
            <td><input type="text" name="username" size="40" /></td>
        </tr>
        <tr>
        	<th>注册邮箱</th>
            <td><input type="text" name="email" size="40"  /></td>
        </tr>
        <tr>
      		<th></th>
            <td><input type="submit" name="dosubmit" value="发送邮件" /></td>
</tr>
    </table>
    </form>
</div>
<?php include template('wslm','footer'); ?>