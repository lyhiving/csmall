<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<script type="text/javascript" src="images/js/validator.js"></script>
<div id="main">
  <?php include template($mod , 'left'); ?>
  <div id="right">
    <p id="position"><strong>当前位置：</strong><a href="">首页</a><a href="<?php echo $M['url'];?>">邮件订阅</a>订阅退订</p>
    <div class="clear"></div>	
<form action="<?php echo $MODULE[$mod]['url'];?>nosubscription.php?action=del" method="post" name ="thisForm" id="thisForm" >
    <table cellpadding="0" cellspacing="1" class="table_form">
      <caption>订阅退订</caption>
  <tr>
        <th width="20%">类型</th>
        <td style="text-align:left;">
        <?php if(!empty($types)) { ?>
        <?php $i=1?>
        <?php if(is_array($types)) foreach($types AS $type) { ?>
        <span style="width: 100px;">
          <input type="checkbox" class="checkbox_style" name="typeid[]" id="typeid" value="<?php echo $type['typeid'];?>"/> <?php echo $type['name'];?></span><?php if($i%5 == 0) echo "<br />"?>
          <?php $i++?>
        <?php } ?>
        <?php } else { ?>
        <span style="width:100px;color:red;">暂时无订阅类型......</span>
        <?php } ?>
        </td>
      </tr>
      <tr>
    <th>退订邮箱</th>
        <td style="text-align:left;">
          <input type="text" name="email" id="email" value="" require="true" datatype="email" msg="填写正确的E-mail"/>
        </td>
      </tr>
    <tr>	
    <td></td>
    <td style="text-align:left;">
      <input type="submit" name="dosubmit" id="dobutton" value="退订" /></td>
    </tr>
</table>
</form>
    <table cellspacing="1" cellpadding="0" class="table_info">
      <caption>提示信息</caption>
      <tr>
        <td> 输入你的订阅E-mai,同时选择你该邮箱订阅过的类型，点击<span style="color:red;">退订</span>按钮,你订阅的E-mail将被放送一封确认连接地址，通过点击连接地址来确认你的退订！<br/>
        </td>
      </tr>
    </table>
  </div>
</div>
<div class="clear"></div>
<script type="text/javascript">
<!--
$().ready(function() {
  $('form').checkForm(1);
});
//-->
</script>
<?php include template('member','footer'); ?>
