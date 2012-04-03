<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template("member","header"); ?>
<script type="text/javascript" src="images/js/validator.js"></script>
<div id="main">
<?php include template("member","left"); ?>
<div id="right">
  <p id="position"> <strong>当前位置：</strong><a href="<?php echo $M['url'];?>index.php">会员中心</a>修改密码提示问题</p>
   <form action="<?php echo $M['url'];?>editanwser.php" method="post" name="editanswerform" id="editanswerform">
    <table cellpadding="0" cellspacing="1" class="table_form">
<caption>修改密码提示问题</caption>
<?php if($M[enableQchk]) { ?>
    <tr>
      <th width="20%">密码提示问题：</th>
      <td><select name="info[question]" id="question" tabindex=4 alt="密码查询问题：无内容">
          <option selected value="">--请您选择--</option>
          <option value="我手机号码的后6位？">我手机号码的后6位？</option>
          <option value="我母亲的生日？">我母亲的生日？</option>
          <option value="我父亲的生日？">我父亲的生日？</option>
          <option value="我最好朋友的生日？">我最好朋友的生日？</option>
          <option value="我儿时居住地的地址？">我儿时居住地的地址？</option>
          <option value="我小学校名全称？">我小学校名全称？</option>
          <option value="我中学校名全称？">我中学校名全称？</option>
          <option value="离我家最近的医院全称？">离我家最近的医院全称？</option>
          <option value="离我家最近的公园全称？">离我家最近的公园全称？</option>
          <option value="我的座右铭是？">我的座右铭是？</option>
          <option value="我最喜爱的电影？">我最喜爱的电影？</option>
          <option value="我最喜爱的歌曲？">我最喜爱的歌曲？</option>
          <option value="我最喜爱的食物？">我最喜爱的食物？</option>
          <option value="我最大的爱好？">我最大的爱好？</option>
          <option value="我最喜欢的小说？">我最喜欢的小说？</option>
          <option value="我最喜欢的运动队？">我最喜欢的运动队？</option>
        </select>
      </td>
    </tr>	
    <tr>
      <th>问题答案：</th>
      <td><input name="info[answer]" type="text" id="answer" size="30" value="" require="true" datatype="require" msg="问题答案不能为空"></td>
    </tr>
<tr>
  <th>您的登陆密码：</th>
  <td><input name="info[password]" type="password" id="password" size="30" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" ></td>
</tr>
<tr>
      <th></th>
      <td>
        <input type="submit" name="dosubmit" id="button" value="确 定" />
　
        <input type="reset" name="button2" id="button2" value="重 置" />
</td>
    </tr>
<?php } ?>
</table>
   </form>
</div>
</div>
<?php include template("member","footer"); ?>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
</script>