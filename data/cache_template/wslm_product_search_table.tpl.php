<?php defined('IN_WSLM') or exit('Access Denied'); ?><form name="productform" action="search.php" method="get" >
  <ul id="product_search">
<li><input type="text" name="title" id="title" value="请输入产品名称" size="26" onblur="if(this.value=='')this.value='请输入产品名称'" onfocus="this.value=''"/></li>
<li>关键字：<input type="text" name="keywords" id="prductkey" value="" size="18" /></li>
<li>价　格：<input type="text" name="price[start]" id="price" value="" size="6"/> - <input type="text" name="price[end]" id="price" value="" size="7" /></li>
<li>型　号：<input type="text" name="size" id="size" value="" size="18" /></li>
<li><input type="hidden" value="<?php echo $catid;?>" name="catid" />
<a href="search.php?catid=<?php echo $catid;?>">高级搜索</a> <input type="submit" value=" 搜 索 " name="dosubmit" class="btn_blue" onclick="checkform();"/>
</li>
  </ul>
</form>
<script type="text/javascript">
<!--
function checkform()
{
if($('#title').val()=='请输入产品名称') $('#title').val('');
}
//-->
</script>