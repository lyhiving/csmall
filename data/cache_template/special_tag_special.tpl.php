<?php function _tag_special_tag_special($data, $number, $rows, $count, $page, $pages, $setting){ global $WSLM,$MODULE,$M,$CATEGORY,$TYPE,$AREA,$GROUP,$MODEL,$templateid,$_userid,$_username;@extract($setting);?><?php if(is_array($data)) foreach($data AS $n => $r) { ?>
<li><a href="<?php echo $r['url'];?>" target="<?php echo $target;?>"><span></span><img src="<?php echo thumb($r[thumb], $width, $height);?>" alt="<?php echo $r['title'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>"/></a><span><strong><a href="<?php echo $r['url'];?>" class="orange"><?php echo str_cut(strip_tags($r[title]),32);?></a></strong><br />
  <?php echo str_cut(strip_tags($r[description]),60);?></span></li>
<?php } ?><?php } ?>