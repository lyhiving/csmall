<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template("member","header"); ?>
<script type="text/javascript" src="images/js/validator.js"></script>
<script type="text/javaScript">
var prices = Array();
prices['y'] = <?php echo $price_y;?>;
prices['m'] = <?php echo $price_m;?>;
prices['d'] = <?php echo $price_d;?>;

$(function(){
   set_amount();
});
function checkform()
{
    set_amount();
var unit = $("input[name=unit]:checked").val();
var price = Math.abs(prices[unit]);
var number = Math.abs($('#number').val());
var total = price*number;
if(total > <?php echo $balance;?>)
{
    alert('余额不足，请先充值！');
return false;
}
return true;
}

function set_amount()
{
var unit = $("input[name=unit]:checked").val();
var price = Math.abs(prices[unit]);
var number = Math.abs($('#number').val());
var total = price*number;
$('#total').html(total);
if($('#price_y').attr('checked') == true) $('#unitname').html('年');
else if($('#price_m').attr('checked') == true) $('#unitname').html('月');
else if($('#price_d').attr('checked') == true) $('#unitname').html('天');
if(total > <?php echo $balance;?>)
{
    <?php if($M['paytype'] == 'amount') { ?>
       var payurl = 'showpayment.php?action=type&pay=online&amount='+(total > <?php echo $balance;?>);
<?php } else { ?>
       var payurl = 'showpayment.php?action=buypoint';
<?php } ?>
    $('#pay').html('您的余额不足，请<a href="<?php echo $MODULE['pay']['url'];?>'+payurl+'" style="color:red;">点击这里充值</a>！');
return false;
}
else
{
    $('#pay').html('');
return true;
}
}
</script>
<div id="main">
<?php include template("member","left"); ?>
<div id="right">
  <p id="position"> <strong>当前位置：</strong><a href="">首页</a><a href="<?php echo $M['url'];?>index.php">会员中心</a><a href="<?php echo $M['url'];?>upgrade.php">会员升级</a>立即升级</p>
  <form action="<?php echo $M['url'];?>upgrade.php?action=pay&groupid=<?php echo $groupid;?>" method="post" name="myform" onsubmit="return checkform()">
    <input type="hidden" name="forward" value="<?php echo $forward;?>">
    <table cellpadding="0" cellspacing="1" class="table_info">
    <caption>会员升级</caption>
      <tr>
        <th width="20%"><b>会员级别：</b></th>
        <td><?php echo $name;?></td>
      </tr>
      <tr>
        <th><b>会员资费：</b></th>
        <td style="color:orange;font-weight:bold;">
<?php if($price_y>0) { ?><input type="radio" name="unit" id="price_y" value="y" checked onclick="set_amount()"> 包年： <?php echo $price_y;?><?php echo $unitname;?>/年<br /><?php } ?>
<?php if($price_m>0) { ?><input type="radio" name="unit" id="price_m" value="m" onclick="set_amount()"> 包月： <?php echo $price_m;?><?php echo $unitname;?>/月<br /><?php } ?>
<?php if($price_d>0) { ?><input type="radio" name="unit" id="price_d" value="d" onclick="set_amount()"> 包日： <?php echo $price_d;?><?php echo $unitname;?>/天<br /><?php } ?>
</td>
      </tr>
      <tr>
        <th><b>购买时限：</b></th>
        <td><input type="text" name="number" id="number" value="1" size="3" maxlength="3" onblur="set_amount()"> <span id="unitname">年</span></td>
      </tr>
      <tr>
        <th><b>所需费用：</b></th>
        <td style="color:red;font-weight:bold;"><span id="total"><?php echo $price_y;?></span><?php echo $unitname;?></td>
      </tr>
       <tr>
        <th><b>当前余额：</b></th>
        <td><span style="color:blue;font-weight:bold;"><?php echo $balance;?><?php echo $unitname;?></span> <span id="pay"></span></td>
      </tr>
     <tr>
        <th></th>
        <td><input type="submit" name="dosubmit" value="立即升级"></td>
      </tr>
    </table>
  </form>
</div>
<?php include template("member","footer"); ?>