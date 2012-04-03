<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template("wslm","header"); ?>
<div id="main">
  <form name="myform" method="post" action="<?php echo $MODULE['mail']['url'];?>sendmail.php" onSubmit="javascript:return check();">
    <table cellpadding="0" cellspacing="1" class="table_form">
    <caption>邮件推荐</caption>
      <tr>
        <th width="12%">收件人Email：</th>
        <td width="28%"><input name="mailto" type="text" id="mail_to" size="30" value="<?php echo $mailto;?>" require="true" datatype="email" msg="请输入正确的邮箱地址" />
          <font color="red">*</font></td>
      </tr>
      <tr>
        <th>邮件主题：</th>
        <td><input name="title" type="text" id="title" size="50" value="<?php echo $title;?>" />
          <font color="red">*</font></td>
      </tr>
      <tr>
        <th>邮件内容：</th>
        <td><textarea name="content" rows="10" cols="50"><?php echo $content;?></textarea>
          <font color="red">*</font></td>
      </tr>
      <?php if($M[ischeckcode]) { ?>
    <tr><th>请输入验证码：</th><td> <?php echo form::checkcode('checkcode',4,'require="true" datatype="require" msgid="checkcodetip" msg="请输入验证码"');?>
    </td>
    </tr>
    <?php } ?>
      <tr>
        <th></th>
        <td><label>
          <input name="dosubmit" type="submit" class="button" value=" 发送 ">
          <input name="Reset" type="reset" class="button" value=" 重置 ">
          </label></td>
      </tr>
    </table>
  </form>
</div>
</div>
<?php include template("member","footer"); ?>
<script language="javascript" src="<?php echo SITE_URL;?>images/js/validator.js"></script>
<script language="javascript" type="text/javascript">
$('form').checkForm(0);
</script>
