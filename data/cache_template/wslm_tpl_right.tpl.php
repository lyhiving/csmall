<?php defined('IN_WSLM') or exit('Access Denied'); ?><?php $curUrl = $CATEGORY[$catid]['url'];?>
<?php if (strpos($curUrl, 'about') !== false) :?>
<div class="right_mbg">
<div class="l_line padding35">
<?php echo block("about_$catid",1);?>
</div>
<div class="text_c">
<?php echo block('about_pic', 2);?>
</div>
</div>
<?php elseif (strpos($curUrl, 'human') !== false):?>
<div class="right_mbg l_line">
<div class="font_h col_40 job" >
<?php echo block("human_$catid",1);?>
</div>
</div>
<?php elseif (strpos($curUrl, 'market') !== false):?>
<div class="right_mbg">
<div class="text_c">
<?php echo block('market_pic',1);?>
</div>
<div class="l_line e4_bg">
<?php echo block("market_$catid",2);?>
</div>
</div>
<?php elseif (strpos($curUrl, 'contact/entity') !== false):?>
<div class="right_mbg">
<div class="w_550">
<?php echo block("contact_$catid",1);?>
</div>
</div>
<?php elseif (strpos($curUrl, 'contact/online') !== false):?>
<div class="right_mbg">
<div class="w_550">
<?php cache_read('2.html', CACHE_FORM) ?>
</div>
</div>
<?php endif;?>
