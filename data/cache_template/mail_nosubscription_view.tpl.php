<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<script type="text/javascript" src="images/js/validator.js"></script>
<div id="main">
  <?php include template($mod , 'left'); ?>
  <div id="right">
    <p id="position"><strong>当前位置：</strong><a href="">首页</a><a href="<?php echo $M['url'];?>">邮件订阅</a><?php echo $title;?></p>
    <div class="clear"></div>
<form action="<?php echo $MODULE[$mod]['url'];?>nosubscription.php?action=do" method="post" name ="thisForm" id="thisForm" >
    <table cellpadding="0" cellspacing="1" class="table_form">
      <caption><?php echo $title;?></caption>
   <tr>
    <th width="20%">类型</th>
        <td style="text-align:left;">
        <?php if(!empty($types)) { ?>
        <?php $i=1?>
<?php if(is_array($types)) foreach($types AS $key => $type) { ?>
<span style="width:100px;">           
   <input type="checkbox"  value="<?php echo $type['typeid'];?>" id="typeid" name="typeid[]" class="checkbox_style"/> <?php echo $type['name'];?></span><?php if($i%5 == 0) echo "<br />"?>
           <?php $i++?>
<?php } ?>
        <?php } else { ?>
        <span style="width:100px;color:red;">暂时无订阅类型......</span>
        <?php } ?>
        </td>
      </tr>
  <tr>
    <th>订阅邮箱</th>
        <td style="text-align:left;">
           <input type="text" name="mail" id="mail" value="<?php echo $em;?>" require="true" datatype="email" msg="填写正确的E-mail"/>            
        </td>
      </tr>
    <tr>
    <td></td>
      <td style="text-align:left;">
        <input type="submit" name="dosubmit" id="dobutton" value="订阅" />
      </td>
    </tr>
    </table>
</form>	
    <table cellspacing="1" cellpadding="0" class="table_info">
      <caption>提示信息</caption>
      <tr>
        <td> 
            输入你想要使用的订阅E-mai,同时选择你想要订阅的类型，点击<span style="color:red;">订阅</span>按钮,你订阅的E-mail将被放送一封确认连接地址，通过点击连接地址来确认你的订阅！<br/>
        </td>
      </tr>
    </table>
    <!--表单样式-->
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
