<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template("member","header"); ?>
<div id="main">
<?php include template("member","left"); ?>
<div id="right">
  <p id="position"> <strong>当前位置：</strong><a href="">首页</a><a href="<?php echo $M['url'];?>index.php">会员中心</a><a href="<?php echo $M['url'];?>upgrade.php">会员升级</a>查看会员服务</p>
    <table cellpadding="0" cellspacing="1" class="table_info">
    <caption>会员组介绍</caption>
      <tr>
        <th width="15%"><b>会员级别：</b></th>
        <td><?php echo $name;?></td>
      </tr>
      <tr>
        <th><b>会员服务：</b></th>
        <td><?php echo $description;?></td>
      </tr>
    </table>
</div>
</div>
<?php include template("member","footer"); ?>