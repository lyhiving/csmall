<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php include template('wslm','header'); ?>
<link href="templates/default/skins/default/rss.css" rel="stylesheet" type="text/css" />
<!--end head-->
<!--begin main-->
<div id="main">
  <!--begin left-->
  <div id="mian_l_1">
    <div class="rss_nav_top">RSS内容列表</div>
    {tag_一级栏目RSS}
    <div class="rss_nav_btm"></div>
    <div class="rss_nav_top mar_10">RSS订阅</div>    
    <div class="rss_nav" style="text-align:center;">
        <a title="订阅到抓虾" href="http://www.zhuaxia.com/add_channel.php?url=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
        <img border="0" src="images/icon_subshot02_zhuaxia.gif" alt="抓虾" style="margin-bottom: 3px;"/>
        </a>
        <a title="订阅到Rojo" href="http://www.rojo.com/add-subscription?resource=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
        <img border="0" src="images/icon_subshot02_rojo.gif" alt="Rojo" style="margin-bottom: 3px;"/>
      </a>
      <a title="订阅到Google Reader" href="http://fusion.google.com/add?feedurl=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
        <img border="0" src="images/icon_subshot02_google.gif" alt="google reader" style="margin-bottom: 3px;"/>
      </a>
      <a title="订阅到netvibes" href="http://www.netvibes.com/subscribe.php?url=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
        <img border="0" src="images/icon_subshot02_netvibes.gif" alt="netvibes" style="margin-bottom: 3px;"/>
      </a>
      <a title="订阅到My Yahoo" href="http://add.my.yahoo.com/rss?url=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
       <img border="0" src="images/icon_subshot02_yahoo.gif" alt="my yahoo" style="margin-bottom: 3px;"/>
      </a>
     <a title="订阅到newsgator" href="http://www.newsgator.com/ngs/subscriber/subfext.aspx?url=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
       <img border="0" src="images/icon_subshot02_newsgator.gif" alt="newsgator" style="margin-bottom: 3px;"/>
     </a>
      <a title="订阅到Bloglines" href="http://www.bloglines.com/sub/<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
       <img border="0" src="images/icon_subshot02_bloglines.gif" alt="bloglines" style="margin-bottom: 3px;"/>
      </a>
      <a title="订阅到鲜果" href="http://www.xianguo.com/subscribe.php?url=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
        <img border="0" src="images/icon_subshot02_xianguo.jpg" alt="鲜果" style="margin-bottom: 3px;"/>
      </a>
      <a title="订阅到哪吒" href="http://inezha.com/add?url=<?php echo SITE_URL;?>rss.php?rssid=<?php echo $catid;?>" target="_blank">
        <img border="0" src="images/icon_subshot02_nazha.gif" alt="哪吒" style="margin-bottom: 3px;"/>
      </a>
      <a title="订阅到有道" href="http://reader.yodao.com/#url=<?php echo SITE_URL;?>rss.php?respond=output" target="_blank">
        <img border="0" src="images/icon_subshot02_youdao.gif" alt="有道" style="margin-bottom: 3px;"/>
      </a>
    </div>
    <div class="rss_nav_btm"></div>
  </div>
  <div id="mian_r_1">
    <div><img src="images/rssbanner.jpg" alt="rss订阅中心" /></div>
    <div class="cat_title" id="cat_title"><h3><?php echo $title;?></h3></div>
    <?php if(is_array($categorys)) foreach($categorys AS $cid => $c) { ?>
    <div class="cat_rss">
  <h3><a href="rss.php?rssid=<?php echo $c['catid'];?>" target="_blank"><img src="images/rss.gif" alt="rss" /></a><?php echo $c['catname'];?></h3>
  <ul class="txt_list">
    {tag_二级栏目RSS}
  </ul>
</div>
    <?php } ?>
  </div>
</div>
<!--end main-->
<!--begin foot-->
<?php include template('wslm', 'footer'); ?>
<!--end foot-->